config.tx_exlpagesutilities {
	doktypes {
		42 {
			label = LLL:EXT:skin_typo360_blogs/Resources/Private/Language/locallang.xlf:pages.doktype.article
			icon = EXT:skin_typo360_blogs/Resources/Public/Icons/page-icon-article.png
		}
		43 {
			label = LLL:EXT:skin_typo360_blogs/Resources/Private/Language/locallang.xlf:pages.doktype.ticket
			icon = EXT:skin_typo360_blogs/Resources/Public/Icons/page-icon-ticket.png
		}
		44 {
			label = LLL:EXT:skin_typo360_blogs/Resources/Private/Language/locallang.xlf:pages.doktype.snippet
			icon = EXT:skin_typo360_blogs/Resources/Public/Icons/page-icon-snippet.png
		}
	}
}

plugin.tx_exlpagesutilities_pageslist.settings {
	templates {
		last_articles {
			templateFile = EXT:skin_typo360_blogs/Resources/Private/Templates/Extensions/exl_pages_utilities/LastArticles.html
			label = LLL:EXT:skin_typo360_blogs/Resources/Private/Language/Backend.xlf:last_articles

			pathsOptions {
				templateRootPath = EXT:skin_typo360_blogs/Resources/Private/Templates/Templates/
				layoutRootPath = EXT:skin_typo360_blogs/Resources/Private/Templates/Layouts/
				partialRootPath = EXT:skin_typo360_blogs/Resources/Private/Templates/Partials/
			}
		}
	}
}