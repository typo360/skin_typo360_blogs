# Partage
#################################################################################################

lib.share = COA
lib.share {
	1 = TEXT
	1.value = {$config.baseURL}
	2 = TEXT
	2.wrap =
	2.typolink.parameter.current = 1
	2.typolink.addQueryString = GET
	2.typolink.additionalParams.insertData = 1
	2.typolink.addQueryString.exclude = cHash
	2.typolink.returnLast = url
	2.rawUrlEncode = 1
}

# Construction du lien de partage facebook
lib.shareFacebook = COA
lib.shareFacebook.10 = TEXT
lib.shareFacebook.10.value = <a href="http://www.facebook.com/sharer/sharer.php?u=
lib.shareFacebook.20 < temp.url
lib.shareFacebook.20.stdWrap.dataWrap (
	|" target="_blank" title="Partagez sur Facebook" class="icon-alone">
		<i class="fv fv-icone-facebook" aria-hidden="true"></i>
		<span class="screen-reader-text">Partagez sur Facebook</span>
	</a>
)

lib.smallContent = CONTENT
lib.smallContent {
	table = tt_content
	select {
		pidInList.current = 1
		orderBy = sorting
		max = 1
	}
	stdWrap.crop = 500 | &#8230; | 1
	stdWrap.stripHtml = 1
}