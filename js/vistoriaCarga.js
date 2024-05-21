
document.getElementById('Button').addEventListener('click', function() {
    var aparecer = document.getElementById('aparecer');
    if (aparecer.style.display === 'none' || aparecer.style.display === '') {
        aparecer.style.display = 'flex';
    } /*else {
        aparecer.style.display = 'none';
    }*/
});
