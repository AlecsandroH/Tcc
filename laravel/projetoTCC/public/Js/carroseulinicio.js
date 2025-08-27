function scrollPages(direction) {
    const container = document.getElementById("pagesWrapper");
    const scrollAmount = 300; 
    container.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
}