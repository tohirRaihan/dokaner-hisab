function btn1(event) {
    console.log(event.target.removeEventListener('click', btn1));
    console.log('button 1 clicked');
    document.getElementById('btn-2').addEventListener('click', function() {
        console.log('button 2 clicked');
    })
}
// document.getElementById('btn-1').addEventListener('click', function btn1(){
//     console.log('button 1 clicked');
//     console.log(this.removeEventListener('click', btn1));

//     document.getElementById('btn-2').addEventListener('click', function() {
//         console.log('button 2 clicked');
//     })
// })
