Apex.grid={padding:{right:0,left:0}},Apex.dataLabels={enabled:!1};var randomizeArray=function(e){for(var r,t,a=e.slice(),o=a.length;0!==o;)t=Math.floor(Math.random()*o),r=a[--o],a[o]=a[t],a[t]=r;return a};$(document).ready(function(){"use strict";for(var e=[47,45,54,38,56,24,65,31,37,39,62,51,35,41,35,27,93,53,61,27,54,43,19,46],r=[],t=1;t<=24;t++)r.push("2018-09-"+t);var a=["#3688fc"],o=$("#sales-spark").data("colors");o&&(a=o.split(","));var s={chart:{type:"area",height:172,sparkline:{enabled:!0}},stroke:{width:2,curve:"straight"},fill:{opacity:.2},series:[{name:"Hyper Sales",data:randomizeArray(e)}],xaxis:{type:"datetime"},yaxis:{min:0},colors:a,labels:r,title:{text:"$424,652",offsetX:20,offsetY:20,style:{fontSize:"24px"}},subtitle:{text:"Sales",offsetX:20,offsetY:55,style:{fontSize:"14px"}}};new ApexCharts(document.querySelector("#sales-spark"),s).render();a=["#0acf97"];(o=$("#profit-spark").data("colors"))&&(a=o.split(","));var l={chart:{type:"bar",height:172,sparkline:{enabled:!0}},stroke:{width:0,curve:"straight"},fill:{opacity:.5},series:[{name:"Net Profits ",data:randomizeArray(e)}],xaxis:{crosshairs:{width:1}},yaxis:{min:0},colors:a,title:{text:"$135,965",offsetX:20,offsetY:20,style:{fontSize:"24px"}},subtitle:{text:"Profits",offsetX:20,offsetY:55,style:{fontSize:"14px"}}};new ApexCharts(document.querySelector("#profit-spark"),l).render();a=["#734CEA"];(o=$("#spark1").data("colors"))&&(a=o.split(","));var i={chart:{type:"line",height:100,sparkline:{enabled:!0}},series:[{data:[25,66,41,59,25,44,12,36,9,21]}],stroke:{width:4,curve:"smooth"},markers:{size:0},colors:a},a=["#34bfa3"];(o=$("#spark2").data("colors"))&&(a=o.split(","));var n={chart:{type:"bar",height:100,sparkline:{enabled:!0}},series:[{data:[12,14,2,47,32,44,14,55,41,69]}],stroke:{width:3,curve:"smooth"},markers:{size:0},colors:a},a=["#f4516c"];(o=$("#spark3").data("colors"))&&(a=o.split(","));var c={chart:{type:"line",height:100,sparkline:{enabled:!0}},series:[{data:[47,45,74,32,56,31,44,33,45,19]}],stroke:{width:4,curve:"smooth"},markers:{size:0},colors:a},a=["#00c5dc"];(o=$("#spark4").data("colors"))&&(a=o.split(","));var d={chart:{type:"bar",height:100,sparkline:{enabled:!0}},plotOptions:{bar:{horizontal:!1,endingShape:"rounded",columnWidth:"55%"}},series:[{data:[15,75,47,65,14,32,19,54,44,61]}],stroke:{width:3,curve:"smooth"},markers:{size:0},colors:a};new ApexCharts(document.querySelector("#spark1"),i).render(),new ApexCharts(document.querySelector("#spark2"),n).render(),new ApexCharts(document.querySelector("#spark3"),c).render(),new ApexCharts(document.querySelector("#spark4"),d).render()});var colors=["#0652f8"],dataColors=$("#campaign-sent-chart").data("colors");dataColors&&(colors=dataColors.split(","));var options1={chart:{type:"bar",height:60,sparkline:{enabled:!0}},plotOptions:{bar:{columnWidth:"60%"}},colors:colors,series:[{data:[25,66,41,89,63,25,44,12,36,9,54]}],labels:[1,2,3,4,5,6,7,8,9,10,11],xaxis:{crosshairs:{width:1}},tooltip:{fixed:{enabled:!1},x:{show:!1},y:{title:{formatter:function(e){return""}}},marker:{show:!1}}};new ApexCharts(document.querySelector("#campaign-sent-chart"),options1).render();colors=["#0652f8"];(dataColors=$("#new-leads-chart").data("colors"))&&(colors=dataColors.split(","));var options2={chart:{type:"line",height:60,sparkline:{enabled:!0}},series:[{data:[25,66,41,89,63,25,44,12,36,9,54]}],stroke:{width:2,curve:"smooth"},markers:{size:0},colors:colors,tooltip:{fixed:{enabled:!1},x:{show:!1},y:{title:{formatter:function(e){return""}}},marker:{show:!1}}};new ApexCharts(document.querySelector("#new-leads-chart"),options2).render();colors=["#0652f8"];(dataColors=$("#deals-chart").data("colors"))&&(colors=dataColors.split(","));var options3={chart:{type:"bar",height:60,sparkline:{enabled:!0}},plotOptions:{bar:{columnWidth:"60%"}},colors:colors,series:[{data:[12,14,2,47,42,15,47,75,65,19,14]}],labels:[1,2,3,4,5,6,7,8,9,10,11],xaxis:{crosshairs:{width:1}},tooltip:{fixed:{enabled:!1},x:{show:!1},y:{title:{formatter:function(e){return""}}},marker:{show:!1}}};new ApexCharts(document.querySelector("#deals-chart"),options3).render();colors=["#0652f8"];(dataColors=$("#booked-revenue-chart").data("colors"))&&(colors=dataColors.split(","));var options4={chart:{type:"bar",height:60,sparkline:{enabled:!0}},plotOptions:{bar:{columnWidth:"60%"}},colors:colors,series:[{data:[47,45,74,14,56,74,14,11,7,39,82]}],labels:[1,2,3,4,5,6,7,8,9,10,11],xaxis:{crosshairs:{width:1}},tooltip:{fixed:{enabled:!1},x:{show:!1},y:{title:{formatter:function(e){return""}}},marker:{show:!1}}};new ApexCharts(document.querySelector("#booked-revenue-chart"),options4).render();