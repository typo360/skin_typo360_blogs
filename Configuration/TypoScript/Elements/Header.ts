## Bannière
lib.banner = FILES
lib.banner {
	references {
		table = pages
		data = levelmedia:-1,slide
	}
	renderObj = IMG_RESOURCE
	renderObj {
		file.import.data = file:current:publicUrl
	}
}