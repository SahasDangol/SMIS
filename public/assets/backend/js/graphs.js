
graphs = {

    admin_init: function(){
        // alert(yearly_income);

        var income_vs_expense = echarts.init(document.getElementById('income_vs_expense_chart'));

        option = {
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: [ 'Sawan', 'Badhra', 'Asojh', 'Kartik', 'Mangsir', 'Poush', 'Magh', 'Falgun', 'Chaitra','Baisakh', 'Jeth', 'Asar']
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: ['Income', 'Expense']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'Income',
                    data: yearly_income,
                    type: 'line',
                    color: '#0dec0c',
                    areaStyle: {}
                },
                {
                    name:'Expense',
                    data: yearly_expense,
                    type: 'line',
                    color: '#e80d24',
                    areaStyle: {}
                }
            ]
        };

        income_vs_expense.setOption(option);

        function resizeAllECharts() {
            income_vs_expense.resize();
        }

        new ResizeSensor($('.br-mainpanel'), function(){
            resizeAllECharts();
        });


    },

    fee_collections_init: function(){
        var dom = document.getElementById("container");
        var myChart = echarts.init(dom);
        var app = {};
        option = null;
        option = {
            backgroundColor: '#2c343c',

            title: {
                text: 'Fee Collection',
                left: 'center',
                top: 20,
                textStyle: {
                    color: '#ccc'
                }
            },

            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },

            visualMap: {
                show: false,
                min: 80,
                max: 600,
                inRange: {
                    colorLightness: [0, 1]
                }
            },
            series : [
                {
                    name:'Fees',
                    type:'pie',
                    radius : '55%',
                    center: ['50%', '50%'],
                    data:[
                        {value:remaining, name:'Remaining', color:'#fff'},
                        {},
                        {},
                        {},
                        {value:collected, name:'Collected'},

                    ].sort(function (a, b) { return a.value - b.value; }),
                    roseType: 'radius',
                    label: {
                        normal: {
                            textStyle: {
                                color: 'rgba(255, 255, 255, 0.3)'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            lineStyle: {
                                color: 'rgba(255, 255, 255, 0.3)'
                            },
                            smooth: 0.2,
                            length: 10,
                            length2: 20
                        }
                    },
                    itemStyle: {
                        normal: {

                            shadowBlur: 200,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    },

                    animationType: 'scale',
                    animationEasing: 'elasticOut',
                    animationDelay: function (idx) {
                        return Math.random() * 200;
                    }
                }
            ]
        };
        if (option && typeof option === "object") {
            myChart.setOption(option, true);
        }

        /** making all charts responsive when resize **/
        function resizeAllECharts() {
            myChart.resize();
        }

        new ResizeSensor($('.br-mainpanel'), function(){
            resizeAllECharts();
        });
    },

}
transactions = {
    transation_init: function () {
        // alert(income);
        var dom = document.getElementById("container1");
        var myChart = echarts.init(dom);
        var app = {};
        option = null;
        option = {
            title : {
                text: 'Bank Report',
                subtext: 'Visualization',
                x:'center'
            },
            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                x : 'center',
                y : 'bottom',
            },
            toolbox: {
                show : true,
                feature : {
                    mark : {show: true},
                    dataView : {show: true, readOnly: false},
                    magicType : {
                        show: true,
                        type: ['pie', 'funnel']
                    },
                    restore : {show: true},
                    saveAsImage : {show: true}
                }
            },
            calculable : true,
            series : [
                {
                    name:'Bank Report',
                    type:'pie',
                    radius : [30, 110],
                    center : ['75%', '50%'],
                    roseType : 'area',
                    data:[
                        {value:10, name:'rose1'},
                        {value:5, name:'rose2'},
                        {value:15, name:'rose3'},
                        {value:25, name:'rose4'},
                        {value:20, name:'rose5'},
                        {value:35, name:'rose6'},
                        {value:30, name:'rose7'},
                        {value:40, name:'rose8'},
                    ]
                },
                {
                    name:'Bank Report',
                    type:'pie',
                    radius : [20, 110],
                    center : ['25%', '50%'],
                    roseType : 'radius',
                    label: {
                        normal: {
                            show: false
                        },
                        emphasis: {
                            show: true
                        }
                    },
                    lableLine: {
                        normal: {
                            show: false
                        },
                        emphasis: {
                            show: true
                        }
                    },
                    data:income
                },

            ]
        };
        ;
        if (option && typeof option === "object") {
            myChart.setOption(option, true);
        }
    }
}
