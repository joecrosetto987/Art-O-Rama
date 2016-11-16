$(function() {

  /* Build new ShopifyBuy client
  ============================================================ */
  var client = ShopifyBuy.buildClient({
    apiKey: '3e973c5aad16a739769def1f567d0e20',
    myShopifyDomain: 'art-o-rama-gallery',
    appId: '6'
  });
	
	
	  client.fetchProduct('8329441158').then(function (fetchedProduct) {
    var product = fetchedProduct;
    /*var selectedVariant = product.selectedVariant;
    var selectedVariantImage = product.selectedVariantImage;
    var currentOptions = product.options;

    var variantSelectors = generateSelectors(product);
    $('.variant-selectors').html(variantSelectors);

    updateProductTitle(product.title);
    updateVariantImage(selectedVariantImage);
    updateVariantTitle(selectedVariant);
    updateVariantPrice(selectedVariant);
    attachOnVariantSelectListeners(product);
    updateCartTabButton();
    bindEventListeners();*/
  });
	
	
	/*var product;
	shopClient.fetchProduct(8329441158)
  .then(function (product) {
    product = product;
  });
	
	document.getElementById("joe1").innerHTML = product;*/
	
});
