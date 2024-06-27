function search() {
    var searchTerm = document.getElementById('search').value.toLowerCase();
    console.log(searchTerm);
    var searchItems = document.querySelectorAll('.search-item');

    searchItems.forEach(function (item) {
        var itemName = item.textContent.toLowerCase();
        if (itemName.includes(searchTerm)) {
            item.classList.add('matched');
            item.style.display = 'block'; // إظهار العنصر المطابق
        } else {
            item.classList.remove('matched');
            item.style.display = 'none'; // إخفاء العنصر غير المطابق
        }
    });
}
