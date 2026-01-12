function showCartPopup(){
    document.getElementById("cartPopup").classList.add("show");
    document.getElementById("cartOverlay").classList.add("show");
}

function closeCartPopup(){
    document.getElementById("cartPopup").classList.remove("show");
    document.getElementById("cartOverlay").classList.remove("show");
    // add_to_cart.js (AJAX success)
success: function(){
    showCartPopup();
}


<script>
function addToCart(url){
    const popup = document.getElementById("cartPopup");
    popup.classList.add("show");

    setTimeout(() => {
        window.location.href = url;
    }, 600); // popup दिसेल मग redirect
}
</script>
