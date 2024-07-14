function updateQuantity(action, itemId) {
    const quantityElement = document.getElementById(`quantity-${itemId}`);
    let quantity = parseInt(quantityElement.textContent);

    if (action === 'increase') {
        quantity++;
    } else if (action === 'decrease' && quantity > 1) {
        quantity--;
    }

    quantityElement.textContent = quantity;
    updateSummary();
}

function removeItem(itemId) {
    const itemElement = document.querySelector(`.cart-item[data-id="${itemId}"]`);
    itemElement.remove();
    updateSummary();
}

function updateSummary() {
    let subtotal = 0;
    const itemElements = document.querySelectorAll('.cart-item');

    itemElements.forEach(item => {
        const price = parseFloat(item.querySelector('.item-details p:nth-child(3)').textContent.replace('Price: $', ''));
        const quantity = parseInt(item.querySelector('.quantity').textContent);
        subtotal += price * quantity;
    });

    const tax = subtotal * 0.1;  // Example tax rate
    const total = subtotal + tax;

    document.getElementById('subtotal').textContent = subtotal.toFixed(2);
    document.getElementById('tax').textContent = tax.toFixed(2);
    document.getElementById('total').textContent = total.toFixed(2);
}

document.addEventListener('DOMContentLoaded', () => {
    updateSummary();
});
