<?= $this->extend('template/template') ?>
<?= $this->section('content') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<!-- row 1 -->
<div class="flex flex-wrap -mx-3">
    <!-- card1 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Pendapatan hari Ini</p>
                            <h5 class="mb-2 font-bold dark:text-white">$53,000</h5>
                            <p class="mb-0 dark:text-white dark:opacity-60">
                                <span class="text-sm font-bold leading-normal text-emerald-500">+55%</span>
                                since yesterday
                            </p>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                            <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- card2 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Today's Users</p>
                            <h5 class="mb-2 font-bold dark:text-white">2,300</h5>
                            <p class="mb-0 dark:text-white dark:opacity-60">
                                <span class="text-sm font-bold leading-normal text-emerald-500">+3%</span>
                                since last week
                            </p>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                            <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- card3 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">New Clients</p>
                            <h5 class="mb-2 font-bold dark:text-white">+3,462</h5>
                            <p class="mb-0 dark:text-white dark:opacity-60">
                                <span class="text-sm font-bold leading-normal text-red-600">-2%</span>
                                since last quarter
                            </p>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                            <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- card4 -->
    <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
        <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                    <div class="flex-none w-2/3 max-w-full px-3">
                        <div>
                            <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">Sales</p>
                            <h5 class="mb-2 font-bold dark:text-white">$103,430</h5>
                            <p class="mb-0 dark:text-white dark:opacity-60">
                                <span class="text-sm font-bold leading-normal text-emerald-500">+5%</span>
                                than last month
                            </p>
                        </div>
                    </div>
                    <div class="px-3 text-right basis-1/3">
                        <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                            <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- cards row 2 -->
<div class="flex flex-wrap mt-6 -mx-3">
    <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
        <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
            <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                <h6 class="capitalize dark:text-white">Total </h6>
                <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                <input type="number"id="tahun" onchange="chartsewa()" class="form-control" value="<?=date('Y')?>" >
                <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                    <i class="fa fa-arrow-up text-emerald-500"></i>
                    
                    <span class="font-semibold">4% more</span> in 2022
                </p>
                <button class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px " onclick="downloadChartsewa('PDF')">Unduh PDF
                                   </button>
                <a id="download-sewa" download="chart-pendapatan.png">
                                       <button class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px " onclick="downloadChartsewa('PNG')">Unduh PNG</button>
                                   </a>
                    <!-- <i class="fa fa-arrow-up text-emerald-500"></i>
                    <span class="font-semibold">4% more</span> in 2021 -->
                </p>
            </div>
            <div class="flex-auto p-4">

                <div>
                    <canvas id="chartsewa" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
        <div slider class="relative w-full h-full overflow-hidden rounded-2xl">
            <!-- slide 1 -->
            <div slide class="absolute w-full h-full transition-all duration-500">
                <img class="object-cover h-full" src="./assets/img/carousel-1.jpg" alt="carousel image" />
                <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
                    <div class="inline-block w-8 h-8 mb-4 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none">
                        <i class="top-0.75 text-xxs relative text-slate-700 ni ni-camera-compact"></i>
                    </div>
                    <h5 class="mb-1 text-white">Get started with Argon</h5>
                    <p class="dark:opacity-80">There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                </div>
            </div>

            <!-- slide 2 -->
            <div slide class="absolute w-full h-full transition-all duration-500">
                <img class="object-cover h-full" src="./assets/img/carousel-2.jpg" alt="carousel image" />
                <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
                    <div class="inline-block w-8 h-8 mb-4 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none">
                        <i class="top-0.75 text-xxs relative text-slate-700 ni ni-bulb-61"></i>
                    </div>
                    <h5 class="mb-1 text-white">Faster way to create web pages</h5>
                    <p class="dark:opacity-80">That’s my skill. I’m not really specifically talented at anything except for the ability to learn.</p>
                </div>
            </div>

            <!-- slide 3 -->
            <div slide class="absolute w-full h-full transition-all duration-500">
                <img class="object-cover h-full" src="./assets/img/carousel-3.jpg" alt="carousel image" />
                <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
                    <div class="inline-block w-8 h-8 mb-4 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none">
                        <i class="top-0.75 text-xxs relative text-slate-700 ni ni-trophy"></i>
                    </div>
                    <h5 class="mb-1 text-white">Share with us your design tips!</h5>
                    <p class="dark:opacity-80">Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                </div>
            </div>

            <!-- Control buttons -->
            <button btn-next class="absolute z-10 w-10 h-10 p-2 text-lg text-white border-none opacity-50 cursor-pointer hover:opacity-100 far fa-chevron-right active:scale-110 top-6 right-4"></button>
            <button btn-prev class="absolute z-10 w-10 h-10 p-2 text-lg text-white border-none opacity-50 cursor-pointer hover:opacity-100 far fa-chevron-left active:scale-110 top-6 right-16"></button>
        </div>
    </div>
</div>

<!-- cards row 3 -->

<div class="flex flex-wrap mt-6 -mx-3">
    <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
        <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl dark:bg-gray-950 border-black-125 rounded-2xl bg-clip-border">
            <div class="p-4 pb-0 mb-0 rounded-t-4">
                <div class="flex justify-between">
                    <h6 class="mb-2 dark:text-white">Transaksi Harian</h6>
                    <input type="number" id="tahun-trans"class="form-control" value="<?=date('Y')?>" onchange="charttotal()">
                                         <select name="bulan" id="bulan-trans" class="form-control" value="<?= date('m') ?>" onchange="charttotal()">
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                                
                </div><button class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px " onclick="downloadCharttotal('PDF')">Unduh PDF
                                   </button>
                <a id="download-total" download="chart-total.png">
                                       <button class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px " onclick="downloadCharttotal('PNG')">Unduh PNG</button>
                                   </a>
                    <!-- <i class="fa fa-arrow-up text-emerald-500"></i>
                    <span class="font-semibold">4% more</span> in 2021 -->
                </p>
            </div>
            <div class="overflow-x-auto">
            <canvas id="charttotal" height="400"></canvas>
            </div>
        </div>
    </div>
    <div class="w-full max-w-full px-3 mt-0 lg:w-5/12 lg:flex-none">
        <div class="border-black/12.5 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
            <div class="p-4 pb-0 rounded-t-4">
                <h6 class="mb-0 dark:text-white">Categories</h6>
            </div>
            <div class="flex-auto p-4">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                    <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-t-lg rounded-xl text-inherit">
                        <div class="flex items-center">
                            <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 rounded-xl">
                                <i class="text-white ni ni-mobile-button relative top-0.75 text-xxs"></i>
                            </div>
                            <div class="flex flex-col">
                                <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-white">Devices</h6>
                                <span class="text-xs leading-tight dark:text-white/80">250 in stock, <span class="font-semibold">346+ sold</span></span>
                            </div>
                        </div>
                        <div class="flex">
                            <button class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-white"><i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                        </div>
                    </li>
                    <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-xl text-inherit">
                        <div class="flex items-center">
                            <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 rounded-xl">
                                <i class="text-white ni ni-tag relative top-0.75 text-xxs"></i>
                            </div>
                            <div class="flex flex-col">
                                <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-white">Tickets</h6>
                                <span class="text-xs leading-tight dark:text-white/80">123 closed, <span class="font-semibold">15 open</span></span>
                            </div>
                        </div>
                        <div class="flex">
                            <button class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-white"><i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                        </div>
                    </li>
                    <li class="relative flex justify-between py-2 pr-4 mb-2 border-0 rounded-b-lg rounded-xl text-inherit">
                        <div class="flex items-center">
                            <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 rounded-xl">
                                <i class="text-white ni ni-box-2 relative top-0.75 text-xxs"></i>
                            </div>
                            <div class="flex flex-col">
                                <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-white">Error logs</h6>
                                <span class="text-xs leading-tight dark:text-white/80">1 is active, <span class="font-semibold">40 closed</span></span>
                            </div>
                        </div>
                        <div class="flex">
                            <button class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-white"><i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                        </div>
                    </li>
                    <li class="relative flex justify-between py-2 pr-4 border-0 rounded-b-lg rounded-xl text-inherit">
                        <div class="flex items-center">
                            <div class="inline-block w-8 h-8 mr-4 text-center text-black bg-center shadow-sm fill-current stroke-none bg-gradient-to-tl from-zinc-800 to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 rounded-xl">
                                <i class="text-white ni ni-satisfied relative top-0.75 text-xxs"></i>
                            </div>
                            <div class="flex flex-col">
                                <h6 class="mb-1 text-sm leading-normal text-slate-700 dark:text-white">Happy users</h6>
                                <span class="text-xs leading-tight dark:text-white/80"><span class="font-semibold">+ 430 </span></span>
                            </div>
                        </div>
                        <div class="flex">
                            <button class="group ease-in leading-pro text-xs rounded-3.5xl p-1.2 h-6.5 w-6.5 mx-0 my-auto inline-block cursor-pointer border-0 bg-transparent text-center align-middle font-bold text-slate-700 shadow-none transition-all dark:text-white"><i class="ni ease-bounce text-2xs group-hover:translate-x-1.25 ni-bold-right transition-all duration-200" aria-hidden="true"></i></button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // chartTransaksi()
        chartsewa()
        charttotal()
        

//  $('#myModal').modal('show'); 
//  this.getChartData()
    });

    function setLineChart(dataset){
        var ctx1 = document.getElementById("chartsewa").getContext("2d");

var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
new Chart(ctx1, {
  type: "line",
  data: {
    labels: ["Jan","Feb","March","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Total Pendapatan",
      tension: 0.4,
      borderWidth: 0,
      pointRadius: 0,
      borderColor: "#5e72e4",
      backgroundColor: gradientStroke1,
      borderWidth: 3,
      fill: true,
      data: dataset,
      maxBarThickness: 6

    }],
    
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: true,
      }
    },
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
          borderDash: [5, 5]
        },
        ticks: {
          display: true,
          padding: 10,
          color: '#fbfbfb',
          font: {
            size: 11,
            family: "Open Sans",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
      x: {
        grid: {
          drawBorder: false,
          display: false,
          drawOnChartArea: false,
          drawTicks: false,
          borderDash: [5, 5]
        },
        ticks: {
          display: true,
          color: '#ccc',
          padding: 20,
          font: {
            size: 11,
            family: "Open Sans",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
    },
  },
});
}function setLineChartTotal(dataset){
    var tanggal= [];
       
        for(let i=0;i<31;i++){
            tanggal[i] = i+1;
        }
     var ctx = document.getElementById("charttotal").getContext("2d");
  
  new Chart(ctx, {
    type: "bar",
    data: {
      labels: tanggal,
      datasets: [
        {
          label: "Total Sewa",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: '#5e72e4',
          data: dataset,
          maxBarThickness: 6,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: true,
        },
      },
      interaction: {
        intersect: false,
        mode: "index",
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
          },
          ticks: {
            suggestedMin: 0,
            suggestedMax: 600,
            beginAtZero: true,
            padding: 15,
            font: {
              size: 14,
              family: "Open Sans",
              style: "normal",
              lineHeight: 2,
            },
            color: "#000",
          },
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
          },
          ticks: {
            display: true,
          },
        },
      },
    },
  });
}function downloadChartImg(download, chart){
        var img = chart.toDataURL("image/jpg", 1.0).replace("image/jpg","image/octet-stream")
        download.setAttribute("href", img)
    }function downloadChartsewa(type){
        var download = document.getElementById('download-sewa')
        var chart = document.getElementById('chartsewa')
        
        if(type=="PNG"){
            downloadChartImg(download, chart)
        }else{
            downloadChartPDF(chart, "Chart-Sewa.pdf")
        }
    }function downloadCharttotal(type){
        var download = document.getElementById('download-total')
        var chart = document.getElementById('charttotal')
        
        if(type=="PNG"){
            downloadChartImg(download, chart)
        }else{
            downloadChartPDF(chart, "Chart-Total Sewa.pdf")
        }
    } function downloadChartPDF(chart, name){
        html2canvas(chart,{
            onrendered: function(canvas){
                var img = canvas.toDataURL("image/jpg",1.0)
                var doc = new jsPDF('p','pt','A4')
                var lebarKonten = canvas.width
                var tinggiKonten = canvas.height
                var tinggiPage = lebarKonten / 102.28 *141.89
                var leftHeight = tinggiKonten
                var position = 0
                var imgWidth = 595.28
                var imgHeight = 595.28 / lebarKonten * tinggiKonten
                if(leftHeight < tinggiPage){
                    doc.addImage(img,'PNG', 0, 0, imgWidth, imgHeight)

                }else{
                    while (leftHeight>0){
                        doc.addIamge(img,'PNG',0,position,imgWidth,imgHeight)

                        leftHeight -= tinggiPage
                        position -= 841.89
                        if(leftHeight > 0){
                            pdf.addPage()
                        }
                    }
                    
                }

                doc.save(name)
                
            }
        });
    }
    function chartsewa()
    {
        var chartExist = Chart.getChart("chartsewa"); // <canvas> id
    if (chartExist != undefined)  
      chartExist.destroy(); 
     var tahun = $('#tahun').val();  
       $.ajax({
            url: "/chartsewa",
            method: "POST",
            data: {
                'tahun': tahun,
                
            },
            success: function(response){
                var result = JSON.parse(response)
                dataset=[0,0,0,0,0,0,0,0,0,0,0,0]
                $.each(result.data, function(i, val){
                    dataset  [val.month - 1 ] = val.total
                });
                // document.getElementById("name").innerHTML = bulan;
                setLineChart(dataset)
            }
        });
    }
    function charttotal()
    {
        var tanggal= [];
       
       for(let i=0;i<31;i++){
           tanggal[i] = 0;
       }
    var tahun = $('#tahun-trans').val();  
    var bulan = $('#bulan-trans').val(); 
        var chartExist = Chart.getChart("charttotal"); // <canvas> id
    if (chartExist != undefined)  
      chartExist.destroy(); 
    //  var tahun = $('#tahun').val();  
       $.ajax({
            url: "/charttotal",
            method: "POST",
            data: {
                'tahun': tahun,
                'bulan': bulan,
                
            },
            success: function(response){
                var result = JSON.parse(response)
                dataset=[0,0,0,0,0,0,0,0,0,0,0,0]
                $.each(result.data, function(i, val){
                    dataset  [val.day - 1 ] = val.total
                });
                // document.getElementById("name").innerHTML = bulan;
                setLineChartTotal(dataset)
            }
        });
    }
</script>
<?= $this->endSection() ?>