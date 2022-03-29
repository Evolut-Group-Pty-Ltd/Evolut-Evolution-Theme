(function () {
  const primaryDarkGreyColor = '#262629';
  const primaryOrangeColor = '#F48120';
  var scriptURL = 'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js';

  // in case script was already loaded somehow
  if(window.ShopifyBuy && window.ShopifyBuy.UI) {
    ShopifyBuyInit();
  } else {
    loadScript();
  }

  // loading the shopify buy script
  function loadScript() {
    var script = document.createElement('script');
    script.async = true;
    script.src = scriptURL;
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(script);
    script.onload = ShopifyBuyInit;
  }

  function ShopifyBuyInit() {
    var client = ShopifyBuy.buildClient({
      domain: jetcharge_shopify['domain'], //'jet-charge-one.myshopify.com',
      storefrontAccessToken: jetcharge_shopify['storefront_access_token'],//'619b5ea26c81450345188f6eef39fcae',
    });

    ShopifyBuy.UI.onReady(client).then(function (ui) {
      const collections = Array.from(document.querySelectorAll('.shopify-collection'));
      collections.forEach(collection => {
        const collectionId = collection.dataset.collectionId;
        const node = collection.querySelector('.shopify-collection__collection');

        ui.createComponent('collection', {
          id: collectionId, //'295968047304',
          node: node,
          moneyFormat: '%24%7B%7Bamount%7D%7D',
          options: {
            "productSet": {
              "styles": {
                "products": {
                  '@media (max-width: 768px)': {
                    'display': 'flex',
                    'flex-wrap': 'wrap',
                    'justify-content': 'space-between',
                    'row-gap': '15px',
                    'margin-left': 0
                  }
                },
              }
            },
            "product": {
              "styles": {
                "product": {

                  "position": "relative",

                  "title": {
                    'text-align': 'left',
                    'font-size': '16px',
                    'font-weight': 'normal',
                    'margin-bottom': '5px',
                    'color': primaryDarkGreyColor
                  },

                  "prices": {
                    'text-align': 'left',
                  },

                  "price": {
                    'color': primaryOrangeColor,
                    'font-size': '16px',

                  },

                  "compareAt": {
                    'color': '#999',
                    'font-size': '16px',

                  },

                  "button": {
                    'position': 'absolute',
                    'top': 0, 'left': 0,
                    'width': '100%', 'height': '100%',
                    'opacity': 0
                  },

                  "@media (max-width: 768px)": {
                    'margin-top': '0 !important',
                    'width': 'calc(50% - 15px / 2)',
                    'margin-left': '0',
                    'min-width': 'auto'
                  }
                }
              },
              // "styles": {
              //   "product": {
              //     "@media (min-width: 601px)": {
              //       "max-width": "calc(25% - 20px)",
              //       "margin-left": "20px",
              //       "margin-bottom": "50px",
              //       "width": "calc(25% - 20px)"
              //     },
              //     "img": {
              //       "height": "calc(100% - 15px)",
              //       "position": "absolute",
              //       "left": "0",
              //       "right": "0",
              //       "top": "0"
              //     },
              //     "imgWrapper": {
              //       "padding-top": "calc(75% + 15px)",
              //       "position": "relative",
              //       "height": "0"
              //     }
              //   },
              //   "button": {
              //     "font-size": "13px",
              //     "padding-top": "14.5px",
              //     "padding-bottom": "14.5px",
              //     ":hover": {
              //       "background-color": "#dd771c"
              //     },
              //     "background-color": "#f6841f",
              //     ":focus": {
              //       "background-color": "#dd771c"
              //     },
              //     "padding-left": "10px",
              //     "padding-right": "10px"
              //   },
              //   "quantityInput": {
              //     "font-size": "13px",
              //     "padding-top": "14.5px",
              //     "padding-bottom": "14.5px"
              //   }
              // },
              "buttonDestination": "modal",
              "contents": {
                "options": false
              },
              "text": {
                "button": "View product"
              },
              "isButton": true
            },
            "modalProduct": {
              "contents": {
                "img": false,
                "imgWithCarousel": true,
                "button": false,
                "buttonWithQuantity": true
              },
              "styles": {
                "product": {
                  "@media (min-width: 601px)": {
                    "max-width": "100%",
                    "margin-left": "0px",
                    "margin-bottom": "0px"
                  }
                },
                "button": {
                  "font-size": "13px",
                  "padding-top": "14.5px",
                  "padding-bottom": "14.5px",
                  ":hover": {
                    "background-color": "#dd771c"
                  },
                  "background-color": "#f6841f",
                  ":focus": {
                    "background-color": "#dd771c"
                  },
                  "padding-left": "10px",
                  "padding-right": "10px"
                },
                "quantityInput": {
                  "font-size": "13px",
                  "padding-top": "14.5px",
                  "padding-bottom": "14.5px"
                }
              }
            },
            "option": {},
            "cart": {
              "styles": {
                "button": {
                  "font-size": "13px",
                  "padding-top": "14.5px",
                  "padding-bottom": "14.5px",
                  ":hover": {
                    "background-color": "#dd771c"
                  },
                  "background-color": "#f6841f",
                  ":focus": {
                    "background-color": "#dd771c"
                  }
                },
                "title": {
                  "color": "#4c4c4c"
                },
                "header": {
                  "color": "#4c4c4c"
                },
                "lineItems": {
                  "color": "#4c4c4c"
                },
                "subtotalText": {
                  "color": "#4c4c4c"
                },
                "subtotal": {
                  "color": "#4c4c4c"
                },
                "notice": {
                  "color": "#4c4c4c"
                },
                "currency": {
                  "color": "#4c4c4c"
                },
                "close": {
                  "color": "#4c4c4c",
                  ":hover": {
                    "color": "#4c4c4c"
                  }
                },
                "empty": {
                  "color": "#4c4c4c"
                },
                "noteDescription": {
                  "color": "#4c4c4c"
                },
                "discountText": {
                  "color": "#4c4c4c"
                },
                "discountIcon": {
                  "fill": "#4c4c4c"
                },
                "discountAmount": {
                  "color": "#4c4c4c"
                }
              }
            },
            "toggle": {
              "styles": {
                "toggle": {
                  "background-color": "#f6841f",
                  ":hover": {
                    "background-color": "#dd771c"
                  },
                  ":focus": {
                    "background-color": "#dd771c"
                  }
                },
                "count": {
                  "font-size": "13px"
                }
              }
            },
            "lineItem": {
              "styles": {
                "variantTitle": {
                  "color": "#4c4c4c"
                },
                "title": {
                  "color": "#4c4c4c"
                },
                "price": {
                  "color": "#4c4c4c"
                },
                "fullPrice": {
                  "color": "#4c4c4c"
                },
                "discount": {
                  "color": "#4c4c4c"
                },
                "discountIcon": {
                  "fill": "#4c4c4c"
                },
                "quantity": {
                  "color": "#4c4c4c"
                },
                "quantityIncrement": {
                  "color": "#4c4c4c",
                  "border-color": "#4c4c4c"
                },
                "quantityDecrement": {
                  "color": "#4c4c4c",
                  "border-color": "#4c4c4c"
                },
                "quantityInput": {
                  "color": "#4c4c4c",
                  "border-color": "#4c4c4c"
                }
              }
            }
          },
        });
      });
    });
  }
})();
