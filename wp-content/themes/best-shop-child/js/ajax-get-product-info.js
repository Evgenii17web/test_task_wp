function openModal(productInfo) {
    let modalContent = document.getElementById('modal-content');
    modalContent.innerHTML = '<img src="' + productInfo.image + '" alt="Product Image">' +
        '<p>' + productInfo.description + '</p>';

    let modal = document.getElementById('product-modal');
    modal.style.display = 'block';
}

function closeModal() {
    let modal = document.getElementById('product-modal');
    debugger
    modal.style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function() {
    let showInfoButtons = document.querySelectorAll('.show-info-btn');

    showInfoButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            let productId = button.getAttribute('data-show-info-product-id');

            debugger
            jQuery.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: {
                    action: 'get_product_info',
                    product_id: productId
                },
                success: function(response) {
                    openModal(response.data);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    });
});
