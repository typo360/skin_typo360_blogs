config {
	doctype = html5
	xmlprologue = none
	disableCharsetHeader = 0

	simulateStaticDocuments = 0
	baseURL = {$config.baseURL}
	tx_realurl_enable = 1
	uniqueLinkVars = 1
	# dont forget to set the allowed range - otherwise anything else could be inserted
	linkVars = L(0-3)

	noPageTitle = 2
	disableImgBorderAttr = 1

	sys_language_mode = strict
	sys_language_overlay = hideNonTranslated
	sys_language_uid = 0
	language = fr
	locale_all = fr_FR.utf8
	htmlTag_langKey = fr
	htmlTag_dir = ltr

#	removeDefaultJS = external
#	inlineStyle2TempFile = 1
#	compressJs = {$config.compressJs}
#	compressCss = {$config.compressCss}
#	concatenateJs = {$config.concatenateJs}
#	concatenateCss = {$config.concatenateCss}

	prefixLocalAnchors = all
	uniqueLinkVars = 1
	extTarget >
	intTarget >
	simulateStaticDocuments = 0
	typolinkCheckRootline = 1
	linkAcrossDomains = 1
	meaningfulTempFilePrefix = 100
	jumpurl_enable = 0
	jumpurl_mailto_disable = 0
	disablePageExternalUrl = 0
	disablePrefixComment = 1
	spamProtectEmailAddresses = 4
	spamProtectEmailAddresses_atSubst = [at]

	noScaleUp = 0
	no_cache = 0
	cache_period = 604800
	cache_clearAtMidnight = 0
	sendCacheHeaders = 1
	enableContentLengthHeader = 1

	message_preview (
		<div style="color:red;font-weight:bold;position:fixed;top:15px;left:15px;background-color:#cdcdcd;border:1px solid #aaa; padding:8px;box-shadow:0px 0px 5px #aaa;width:100px;line-height:30px;text-align:center;">PREVIEW!</div>
	)
	admPanel = 0

	index_enable = 1
	index_metatags = 1
	index_externals = 1

	headerComment =
}
