let element = document.getElementById("barChart");

let request = new XMLHttpRequest();
let response = "";
request.open("get", "/getchartperweek", false);
request.onreadystatechange = function() {

    if (request.status == 200 && request.readyState >= 4) {

        response = JSON.parse(request.response);
        console.log(response)
    }


}
request.send();


const myChart = new Chart(element, {


    type: 'bar',
    data: {
        labels: ["Saturday", 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        datasets: [{
            label: '# of Votes',
            data: response,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }



});