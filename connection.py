# connect to sqlite database
uri = QgsDataSourceUri()
uri.setDatabase("C:\\Projects\\data\\Analysis.sqlite")
schema = ''
table = 'temp_pts'
geom_column = 'GEOMETRY'
uri.setDataSource(schema, table, geom_column)
desnity_pts = QgsVectorLayer(uri.uri(), 'density_pts', 'spatialite')

polys = QgsProject.instance().mapLayersByName('Polygon_Layer')[0]
features = polys.getFeatures()
temp_pts_pr = density_pts.dataProvider()
count = 0
for f in features:
	geom = f.geometry()
	vl = QgsVectorLayer("Polygon?crs=epsg:26910&field=id:integer&index=no", "temporary_poly", "memory")
	pr = vl.dataProvider()
	pr.addFeature(f)
	vl.updateExtents()
	pts_grid_output = processing.run("qgis:regularpoints", 
	{'EXTENT': vl, 'SPACING': 2, 'INSET': 0, 'CRS': 'EPSG:26910', 'IS_SPACING': True, 'OUTPUT': 'memory:pts_grid'})
	pts_grid = pts_grid_output.get('OUTPUT')
	pts_clipped_output = processing.run('native:clip', 
	{'INPUT': pts_grid, 'OVERLAY': vl, 
	'OUTPUT': 'memory:pts_clipped'})
	pts_clipped = pts_clipped_output.get('OUTPUT')
	temp_pts_pr.addFeatures(pts_clipped.getFeatures())
    count += 1
    print("Processing feature: {}".format(count))
QgsProject.instance().addMapLayer(temp_pts)
print('Processing Complete')
