page.meta {
	author							= {$page.meta.author}
	description						= {$page.meta.description}
	keywords						= {$page.meta.keywords}
	viewport						= {$page.meta.viewport}
	robots							= {$page.meta.robots}
	google							= {$page.meta.google}
	apple-mobile-web-app-capable	= {$page.meta.apple-mobile-web-app-capable}
}

lib.openGraph = COA
lib.openGraph {
            
    # Site Name
    10 = TEXT
    10 {
        data = leveltitle:0
        wrap = <meta property="og:site_name" content="|" />
        htmlSpecialChars = 1
    }

    # Line Break
    15 = TEXT
    15.value (


    )

    # Locale
    20 = TEXT
    20.value = fr_FR
    20.wrap = <meta property="og:locale" content="|" />

    25 < .15

    # Page Title
    30 = TEXT
    30 {
        field = title
        wrap = <meta property="og:title" content="|" />
        htmlSpecialChars = 1
    }

    35 < .15

    # Page Description
    40 = TEXT
    40 {
        field = description
        wrap = <meta property="og:description" content="|" />
        htmlSpecialChars = 1
    }

    45 < .15

    # Page URL
    50 = TEXT
    50 {
        typolink.parameter.field = uid
        typolink.returnLast = url
        wrap = <meta property="og:url" content="{TSFE:baseUrl}|" />
        insertData = 1
    }

    55 < .15

    # Page Media
    60 = FILES
    60 {
        references {
            table = pages
            uid.field = uid
            fieldName = media
        }
        maxItems = 1

        renderObj = COA
        renderObj {
            10 = TEXT
            10 {
                data = file:current:publicUrl
                wrap = <meta property="og:image" content="{TSFE:baseUrl}|" />
                insertData = 1
            }
            15 < lib.openGraph.15
            20 = TEXT
            20.data = file:current:width
            20.wrap = <meta property="og:image:width" content="|" />
            25 < .15
            30 = TEXT
            30.data = file:current:height
            30.wrap = <meta property="og:image:height" content="|" />
            35 < .15
            40 = TEXT
            40.data = file:current:mime_type
            40.wrap = <meta property="og:image:type" content="|" />
            #45 < .15
        }
    }

    65 < .15

    # Page Type
    70 = TEXT
    70.value = <meta property="og:type" content="article" />

    75 < .15
    78 < .15

    ### Twitter Open Graph
    80 = TEXT
    80.value = <!-- Twitter metadata -->

    85 < .15

    # Page Title
    90 < .30
    90.wrap = <meta property="twitter:title" content="|" />
    
    95 < .15

    # Page Description
    100 < .40
    100.wrap = <meta property="twitter:description" content="|" />

    105 < .15

    # Page URL
    110 < .50
    110.wrap = <meta property="twitter:url" content="{TSFE:baseUrl}|" />

    115 < .15

    # Page Media
    120 < .60.renderObj.10
    120.wrap = <meta property="twitter:image" content="{TSFE:baseUrl}|" />

    125 < .15
    130 < .15

}

page.headerData.9 < lib.openGraph