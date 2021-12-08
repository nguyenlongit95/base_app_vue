<template>
    <!-- calendar -->
    <div class="statistic-calendar col-md-12">
        <div class="row">
            <div class="accordion col-md-6" id="accordionExample">
                <!-- Calendar one -->
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" v-on:click="changeIconShowHide('one')">
                            <button class="btn btn-link">
                                <p class="float-left">{{ this.thisMonth }}</p>
                            </button>
                            <p class="float-right" type="button">
                                <i class="fa fa-caret-up icon-show-hide" v-if="firstIconShowHide === true"></i>
                                <i class="fa fa-caret-down icon-show-hide" v-if="firstIconShowHide === false"></i>
                            </p>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="calendar" v-if="calendar">
                                <!-- head -->
                                <div class="calendar-row head col-md-12">
                                    <div v-for="(item, index) in dateOfWeek" :key="index" class="row-item">
                                        <strong v-text="item" />
                                    </div>
                                </div>
                                <!-- body -->
                                <div v-for="(row, row_index) in calendar" :key="row_index" class="calendar-row col-md-12">
                                    <div v-for="(cell, cell_index) in row" :key="cell_index" class="row-item row-item-body">
                                        <div v-if="cell == toDay" class="gray-box"></div>
                                        <span v-text="cell ? cell : ''" />
                                        <a href="#" v-on:click="showFormDetail(cell)" data-toggle="modal" data-target="#modalDetailForm" v-if="cell && cell != toDay" class="icon-edit-item-body"><i class="fa fa-pen"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End calendar one -->

                <!-- Calendar two -->
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" v-on:click="changeIconShowHide('two')">
                            <button class="btn btn-link" type="button">
                                <p>{{ this.nextMonth}}</p>
                            </button>
                            <p class="float-right" type="button">
                                <i class="fa fa-caret-up icon-show-hide" v-if="iconShowHideTwo === true"></i>
                                <i class="fa fa-caret-down icon-show-hide" v-if="iconShowHideTwo === false"></i>
                            </p>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse hide" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="calendar" v-if="calendar">
                                <!-- head -->
                                <div class="calendar-row head col-md-12">
                                    <div v-for="(item, index) in dateOfWeek" :key="index" class="row-item">
                                        <strong v-text="item" />
                                    </div>
                                </div>
                                <!-- body -->
                                <div v-for="(row, row_index) in calendar" :key="row_index" class="calendar-row col-md-12">
                                    <div v-for="(cell, cell_index) in row" :key="cell_index" class="row-item row-item-body">
                                        <span v-text="cell ? cell : ''" />
                                        <a href="#" v-on:click="showFormDetail(cell)" data-toggle="modal" data-target="#modalDetailForm" v-if="cell" class="icon-edit-item-body"><i class="fa fa-pen"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End calendar two -->

                <!-- Calendar three -->
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" v-on:click="changeIconShowHide('three')">
                            <button class="btn btn-link" type="button">
                                <p class="float-left">{{ nextTwoMonth }}</p>
                            </button>
                            <p class="float-right" type="button">
                                <i class="fa fa-caret-up icon-show-hide" v-if="iconShowHideThree === true"></i>
                                <i class="fa fa-caret-down icon-show-hide" v-if="iconShowHideThree === false"></i>
                            </p>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse hide" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="calendar" v-if="calendar">
                                <!-- head -->
                                <div class="calendar-row head col-md-12">
                                    <div v-for="(item, index) in dateOfWeek" :key="index" class="row-item">
                                        <strong v-text="item" />
                                    </div>
                                </div>
                                <!-- body -->
                                <div v-for="(row, row_index) in calendar" :key="row_index" class="calendar-row col-md-12">
                                    <div v-for="(cell, cell_index) in row" :key="cell_index" class="row-item row-item-body">
                                        <span v-text="cell ? cell : ''" />
                                        <a href="#" v-on:click="showFormDetail(ell)" data-toggle="modal" data-target="#modalDetailForm" v-if="cell" class="icon-edit-item-body"><i class="fa fa-pen"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End calendar three -->
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ year + '/' + month }}</h3>
                    </div>
                    <div class="card-body">
                        <p>Number of products left in stock.</p>
                        <!-- Begin chart.js -->

                        <!-- End chart.js -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import { Chart } from 'chart.js'

    const axios = require('axios');

    export default {
        name: "StatisticCalendar",

        // extends: Chart,

        // Define variable
        data() {
            return {
                txt: 'Base e-commerce project',
                dateOfWeek: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                calendar: null,
                firstIconShowHide: false,
                iconShowHideTwo: true,
                iconShowHideThree: true,
                month: null,
                year: null,
                thisMonth: moment().format('YYYY/MM'),
                nextMonth: moment().add(1, 'month').format('YYYY/MM'),
                nextTwoMonth: moment().add(2, 'month').format('YYYY/MM'),
                toDay: moment().format('DD'),
                dataChart: null,
                optionChart: {
                    title: {
                        display: true,
                        text: 'Biểu đồ  sản lượng lương thực việt nam'
                    },
                    responsive: true,
                    maintainAspectRatio: false
                },
            };
        },
        // Init function
        created: function () {
            console.log("================Statistic Calendar Begin================");
            // Get current month and year
            this.initDateTime();
        },
        // Define all function here
        methods: {
            /**
             * Demo function call API using Axios
             *
             * @returns {Promise<void>}
             */
            async testCallAPIUsingAxios() {
                let testAPI = await axios({
                    url: '/api/test-api',
                    method: "GET",
                    headers: {
                        Authorization: 'Bearer token'
                    }
                });
                console.log(testAPI);
            },

            initDateTime() {
                let d = moment();
                this.year = d.format('YYYY');
                this.month = d.format('MM');
                this.buildCalendar(this.month, this.year);
            },

            /**
             * Function get first and last day on the month
             *
             * @return object
             */
            getRangeMonth(numbMonth, numbYear) {
                numbMonth = Number(numbMonth) || moment().format('M');
                numbYear = Number(numbYear) || moment().format('YYYY');
                // this.month = moment().format('MM');
                // this.year = moment().format('YYYY');
                return {
                    firstDay: new Date(`${numbYear}-${numbMonth}-1`),
                    lastDay: new Date(`${numbYear}-${numbMonth}-${new Date(numbYear, numbMonth, 0).getDate()}`)
                };
            },

            /**
             * Function build the calendar
             *
             * @param month
             * @param year
             */
            buildCalendar(month, year) {
                let arr = [[]];
                // get the first day and last day of month
                let { firstDay, lastDay } = this.getRangeMonth(month, year);
                // count days
                let countDay = 1;
                // End the for
                for (let i = 1; countDay <= lastDay.getDate(); i++) {
                    for (let j = 0; j < 7; j++) {
                        // first loop
                        if (i == 1) {
                            if (j < firstDay.getDay()) arr[arr.length - 1].push(0);
                            else {
                                arr[arr.length - 1].push(countDay);
                                countDay++;
                            }
                        } else {
                            if (countDay > lastDay.getDate()) arr[arr.length - 1].push(0);
                            else {
                                arr[arr.length - 1].push(countDay);
                                countDay++;
                            }
                        }
                    }
                    if (countDay > lastDay.getDate()) break;
                    arr.push([]);
                }
                this.calendar = arr;
            },

            /**
             * Function change icon show hide
             *
             * @param iconNumber
             */
            changeIconShowHide(iconNumber) {
                // True == icon up and false == icon down
                switch (iconNumber) {
                    case 'one':
                        if (this.firstIconShowHide === true) {
                            this.firstIconShowHide = false;
                            this.iconShowHideTwo = true;
                            this.iconShowHideThree = true;
                            this.initDateTime();
                        } else {
                            this.firstIconShowHide = true;
                            if (this.iconShowHideTwo === false) {
                                this.iconShowHideTwo = false;
                            }
                            if (this.iconShowHideThree === false) {
                                this.iconShowHideThree = false;
                            }
                        }
                        break;
                    case 'two':
                        if (this.iconShowHideTwo === true) {
                            this.iconShowHideTwo = false;
                            this.firstIconShowHide = true;
                            this.iconShowHideThree = true;
                            this.month = moment().add(1, 'month').format('MM');
                            this.year = moment().add(1, 'month').format('YYYY');
                        } else {
                            this.iconShowHideTwo = true;
                            if (this.firstIconShowHide === false) {
                                this.firstIconShowHide = false;
                            }
                            if (this.iconShowHideThree === false) {
                                this.iconShowHideThree = false;
                            }
                        }
                        break;
                    case 'three':
                        if (this.iconShowHideThree === true) {
                            this.iconShowHideThree = false;
                            this.firstIconShowHide = true;
                            this.iconShowHideTwo = true;
                            this.month = moment().add(2, 'month').format('MM');
                            this.year = moment().add(2, 'month').format('YYYY');
                        } else {
                            this.iconShowHideThree = true;
                            if (this.firstIconShowHide === false) {
                                this.firstIconShowHide = false;
                            }
                            if (this.iconShowHideTwo === false) {
                                this.iconShowHideTwo = false;
                            }
                        }
                        break;
                    default:
                        break;
                }
            },

            /**
             * Function show form detail and filter data
             *
             * Call to api and fill data to form
             */
            async showFormDetail(day) {
                let testAPI = await axios({
                    url: '/api-internal/product-sales?month=' + this.month + '&day=' + day + '&year=' + this.year,
                    method: "GET",
                    headers: {
                        Authorization: 'Bearer token'
                    }
                });
                console.log(testAPI.data.data);

                this.data =  {
                    labels: ['1990', '1995', '2000', '2005', '2010', '2015', '2020'],
                        datasets: [{
                        label: 'đơn vị (triệu tấn)',
                        backgroundColor: ['#3e95cd', '#8e5ea2', '#3cba9f', '#e8c3b9', '#c45850', '#3e95cd', '#8e5ea2'],
                        data: [63.2, 52.1, 73.4, 78.4, 80.5, 79.2, 82.1]
                    }]
                };
            },
        },

        // Function mounted:
        mounted() {
            console.log("======================Static calendar end======================");
        },
        watch: {
            /**
             * Listen for the change of the month variable and proceed to call the render function calendar again
             */
            month() {
                this.buildCalendar(this.month, this.year);
            }
        }
    }
</script>

<style scoped>
    .statistic-calendar {
        padding: 0 1em;
    }
    .calendar-row {
        display: flex;
    }
    .row-item-body:hover {
        background: #e0e0e0;
    }
    .head div{
        height: 64px;
        color: #eb5757;
        background: #eb57571a;
        border: thin solid #eb575733;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .row-item {
        flex-grow: 1;
        border: thin solid #e2e8f0;
        border-top: none;
        height: 70px;
        min-width: 70px;
        width: calc(100% / 7);
        position: relative;
    }
    span {
        position: absolute;
        top: 5px;
        left: 5px;
        color: #7184a3;
        font-size: 16px;
    }
    .icon-show-hide {
        margin-top: 15px;
    }
    .btn-link {
        margin-top: 5px;
    }
    .icon-edit-item-body {
        text-align: right;
        float: right;
        margin-top: 5px;
        margin-right: 5px;
    }
    .gray-box {
        height: 100%;
        width: 102%;
        z-index: 99;
        background: #e0e0e0;
        margin-left: -1px;
    }
    .card-body {
        padding: .5rem;
    }
    #modalDetailForm {
        top: 120px;
        left: auto;
        width: 100%;
    }
    .modal-dialog {
        left: 250px;
    }
    .label-item {
        vertical-align: middle;
        margin-top: 7px;
    }
    .btn-update-info {
        background: orange;
        color: #fff;
    }
</style>
