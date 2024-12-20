setInterval(function() {
    let dt = new Date();
    var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                    "Agustus", "September", "Oktober", "November", "Desember"];
    var days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    let hrs = dt.getHours();
    let min = dt.getMinutes();
    let sec = dt.getSeconds();
    let day = dt.getDay();
    let date = dt.getDate();
    let month = dt.getMonth() + 1;
    let year = dt.getFullYear();
    
    min = startTicking(min);
    sec = startTicking(sec);

    // Show time and date.
    
    if (day == 0){
        document.getElementById('day_year').innerHTML = 'Minggu, ' + date + '/'+ month + '/'+ year;
    }
    else if (day == 1){
        document.getElementById('day_year').innerHTML = 'Senin, ' + date + '/'+ month + '/'+ year;
    }
    else if (day == 2){
        document.getElementById('day_year').innerHTML = 'Selasa, ' + date + '/'+ month + '/'+ year;
    }
    else if (day == 3){
        document.getElementById('day_year').innerHTML = 'Rabu, ' + date + '/'+ month + '/'+ year;
    }
    else if (day == 4){
        document.getElementById('day_year').innerHTML = 'Kamis, ' + date + '/'+ month + '/'+ year;
    }
    else if (day == 5){
        document.getElementById('day_year').innerHTML = 'Jumat, ' + date + '/'+ month + '/'+ year;
    }
    else if (day == 6){
        document.getElementById('day_year').innerHTML = 'Sabtu, ' + date + '/'+ month + '/'+ year;
    }   
    
    if (hrs >= 12) { 
        document.getElementById('dc').innerHTML = hrs + ':' + min + ':' + sec + ' PM'; 
    }
    else { 
        document.getElementById('dc').innerHTML = hrs + ':' + min + ':' + sec + ' AM'; 
    }
});

let startTicking = (val) => {
    if (val < 10) {
        val = '0' + val;
    }
    return val;
}