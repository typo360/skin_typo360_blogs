page = PAGE
page {
	typeNum = 0
	shortcutIcon = {$page.meta.favicon}

	includeCSS {
		bootstrap = {$includePath.css}bootstrap.min.css
		fontAwesome = {$includePath.css}font-awesome.min.css
		add = {$includePath.css}skin.css
	}

	includeJSFooterlibs {
#		jquery = {$includePath.javascript}jquery-2.1.1.min.js
		bootstrap = {$includePath.javascript}bootstrap.min.js
	}

	javascriptLibs.jQuery = 1

	jsInline {

	}

	headerData {
		10 = TEXT
		10.wrap = <title>|&nbsp;&#8211;&nbsp;{$page.meta.title}</title>
		10.data = page:title

		// Flip ahead browsing for IE10/11.
		11 = HMENU
		11 {
			special = browse
			special {
				items = prev|next
			}
			1 = TMENU
			1.NO {
				allWrap = <link rel="prev" href="|" /> |*| <link rel="prev" href="|" /> |*| <link rel="next" href="|" />
				doNotLinkIt = 1
				stdWrap {
					typolink {
						parameter.data = field:uid
						useCacheHash = 1
						returnLast = url
					}
				}
			}
		}
	}

	bodyTagCObject = TEXT
	bodyTagCObject {
		wrap = <body class="|">
		data = register:pageLayout
	}

	1 = LOAD_REGISTER
	1 {
		pageLayout.cObject = TEXT
		pageLayout.cObject {
			data = levelfield:-1, backend_layout_next_level, slide
			override.field = backend_layout
			split {
				token = SkinTypo360Blogs__
				1.current = 1
				1.wrap = |
			}
		}
	}

	# Google Analytics
	5 = TEXT
	5.value = {$config.idGoogleAnalytics}
	#		10.ifEmpty =
	5.wrap.splitChar = #CODE#
	5.wrap(
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', '#CODE#', 'auto');
			ga('send', 'pageview');
		</script>
	)

	10 = FLUIDTEMPLATE
	10 {
		file = EXT:skin_typo360_blogs/Resources/Private/Templates/Templates/Default.html
		format = html

#		template = \EXL\SkinTypo360Blogs\Test\Test


		partialRootPath {
			10 = skin_romaincanon
			10.wrap = EXT:|/Resources/Private/Templates/Partials

			20 = skin_typo360_blogs
			20.wrap = EXT:|/Resources/Private/Templates/Partials
		}
#		partialRootPath = EXT:skin_typo360_blogs/Resources/Private/Templates/Partials


		layoutRootPath {
			10 = EXT:skin_romaincanon/Resources/Private/Templates/Layout
			20 = EXT:skin_typo360_blogs/Resources/Private/Templates/Layout
		}

		extbase.controllerExtensionName = skin_typo360_blogs

		variables {
			lll = TEXT
			lll.value = LLL:EXT:skin_typo360_blogs/Resources/Private/Language/locallang.xlf:

			homepage = TEXT
			homepage.value = {$page.specialPages.homepage}

			rootPage = TEXT
			rootPage.data = leveluid:0

			layout = TEXT
			layout.data = register:pageLayout
		}
	}
}


[PIDupinRootline = {$page.specialPages.articlePage}]
	page.10.file = EXT:skin_typo360_blogs/Resources/Private/Templates/Templates/Article.html
[end]

lib.content0 < styles.content.get
lib.content1 < styles.content.getLeft
lib.content2 < styles.content.getRight
lib.content3 < styles.content.getBorder