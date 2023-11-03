<script>
    $( document ).ready(function() {
        //------ DOUNUT GRAPH -------// 
        showGraphSmcar_Owner_Doughnut();
        ShowGraphSmcar_Type_Bar();
        ShowGraphMachine_Type_Doughnut();
        ShowGraphMachine_Type_Bar();
        ShowGraphTruck_Type_Doughnut();  
        ShowGraphTruck_Type_Bar(); 
        ShowGraphGeneral_work_Type_Doughnut();
        ShowGraphGeneral_work_Type_Bar();         
    });
    function showGraphSmcar_Owner_Doughnut(){
        var data_obj_smcar = @php echo json_encode($data_chart_count_smcar_owner); @endphp;
            //console.log(data_obj_smcar);
              let owner_car = [];
              let count_car = [];
              for(let i in data_obj_smcar){
                  owner_car.push(data_obj_smcar[i].owner);
                  count_car.push(data_obj_smcar[i]._c);
              }
            //   console.log(owner_car);
            //   console.log(count_car);
              var barColors = ['rgba(255,0,0,0.2)','rgba(255,102,0,0.2)','rgba(255,153,0,0.2)','rgba(255,215,0,0.2)',
                               'rgba(255,255,51,0.2)','rgba(102,204,51,0.2)','rgba(51,153,51,0.2)','rgba(51,153,153,0.2)',
                               'rgba(51,153,255,0.2)','rgba(0,51,153,0.2)','rgba(102,0,153,0.2)','rgba(199,21,133,0.2)',
                               'rgba(255,20,147,0.2)'];
              var barColors_hover_bg = ['rgba(255,0,0,0.5)','rgba(255,102,0,0.5)','rgba(255,153,0,0.5)','rgba(255,215,0,0.5)',
                                        'rgba(255,255,51,0.5)','rgba(102,204,51,0.5)','rgba(51,153,51,0.5)','rgba(51,153,153,0.5)',
                                        'rgba(51,153,255,0.5)','rgba(0,51,153,0.5)','rgba(102,0,153,0.5)','rgba(199,21,133,0.5)',
                                        'rgba(255,20,147,0.5)'];
              var barColors_border = ['rgba(255,0,0,1)','rgba(255,102,0,1)','rgba(255,153,0,1)','rgba(255,215,0,1)',
                                      'rgba(255,255,51,1)','rgba(102,204,51,1)','rgba(51,153,51,1)','rgba(51,153,153,1)',
                                      'rgba(51,153,255,1)','rgba(0,51,153,1)','rgba(102,0,153,1)','rgba(199,21,133,1)',
                                      'rgba(255,20,147,1)'];
              let chartdata = {
                  labels:owner_car,
                  datasets:[{
                      labels:'ข้อมูลรถยนต์ส่วนกลาง',
                      backgroundColor: barColors,
                      borderColor: barColors_border,
                      borderWidth: 2,
                      hoverBackgroundColor: barColors_hover_bg,
                      hoverBorderColor: barColors_border,
                      data:count_car,
                      hoverOffset: 5,   
                  }]
              };
              var options = {
                          responsive:true,
                          maintainAspectRatio: true,
                          plugins:{
                              legend:{
                                  labels:{
                                      color: '#778899',
                                      font:{
                                          size: 14
                                      },
                               
                                  },
                                // display: false
                              } 
                          }   
              };
              let graphTarget = $('myChart_smcar');
              let barGraph = new Chart(myChart_smcar,{
                  type:'doughnut',
                  data:chartdata,
                  options:options,
                  legend:{
                  } 
                  
              })
    }
    function ShowGraphSmcar_Type_Bar(){
        var data_obj_smcar = @php echo json_encode($data_chart_count_smcar_owner); @endphp;
            //console.log(data_obj_smcar);
              let owner_car = [];
              let count_car = [];
              for(let i in data_obj_smcar){
                  owner_car.push(data_obj_smcar[i].owner);
                  count_car.push(data_obj_smcar[i]._c);
              }
            //   console.log(owner_car);
            //   console.log(count_car);
              var barColors = ['rgba(255,0,0,0.2)','rgba(255,102,0,0.2)','rgba(255,153,0,0.2)','rgba(255,215,0,0.2)',
                               'rgba(255,255,51,0.2)','rgba(102,204,51,0.2)','rgba(51,153,51,0.2)','rgba(51,153,153,0.2)',
                               'rgba(51,153,255,0.2)','rgba(0,51,153,0.2)','rgba(102,0,153,0.2)','rgba(199,21,133,0.2)',
                               'rgba(255,20,147,0.2)'];
              var barColors_hover_bg = ['rgba(255,0,0,0.5)','rgba(255,102,0,0.5)','rgba(255,153,0,0.5)','rgba(255,215,0,0.5)',
                                        'rgba(255,255,51,0.5)','rgba(102,204,51,0.5)','rgba(51,153,51,0.5)','rgba(51,153,153,0.5)',
                                        'rgba(51,153,255,0.5)','rgba(0,51,153,0.5)','rgba(102,0,153,0.5)','rgba(199,21,133,0.5)',
                                        'rgba(255,20,147,0.5)'];
              var barColors_border = ['rgba(255,0,0,1)','rgba(255,102,0,1)','rgba(255,153,0,1)','rgba(255,215,0,1)',
                                      'rgba(255,255,51,1)','rgba(102,204,51,1)','rgba(51,153,51,1)','rgba(51,153,153,1)',
                                      'rgba(51,153,255,1)','rgba(0,51,153,1)','rgba(102,0,153,1)','rgba(199,21,133,1)',
                                      'rgba(255,20,147,1)'];
              let data = {
                  labels:owner_car,
                  datasets:[{
                      label:'',
                      data:count_car,
                      backgroundColor: barColors,
                      borderColor: barColors_border,
                      borderWidth: 2,
                      hoverBackgroundColor: barColors_hover_bg,
                      hoverBorderColor: barColors_border,                      
                    //   hoverOffset: 20,   
                  }]
              };
              var options = {
                          responsive:true,
                          maintainAspectRatio: true,
                          plugins:{
                              legend:{
                                //   labels:{
                                    //   color: '#778899',
                                    //   font:{
                                    //       size: 14
                                    //   },
                                //   verticalAlign:"bottom",
                                //   },
                                display: false
                                } 
                          }
                             
              };
              let graphTarget = $('myChart_smcar_type');
              let barGraph = new Chart(myChart_smcar_type,{
                  type:'bar',
                  data:data,
                  options:options,
                  legend:{
                  } 
                  
              })
    }
    function ShowGraphMachine_Type_Doughnut(){
        var data_obj_smcar = @php echo json_encode($data_chart_count_machine_owner); @endphp;
            //console.log(data_obj_smcar);
              let owner_car = [];
              let count_car = [];
              for(let i in data_obj_smcar){
                  owner_car.push(data_obj_smcar[i].owner);
                  count_car.push(data_obj_smcar[i]._c);
              }
            //   console.log(owner_car);
            //   console.log(count_car);
              var barColors = ['rgba(255,0,0,0.2)','rgba(255,102,0,0.2)','rgba(255,153,0,0.2)','rgba(255,215,0,0.2)',
                               'rgba(255,255,51,0.2)','rgba(102,204,51,0.2)','rgba(51,153,51,0.2)','rgba(51,153,153,0.2)',
                               'rgba(51,153,255,0.2)','rgba(0,51,153,0.2)','rgba(102,0,153,0.2)','rgba(199,21,133,0.2)',
                               'rgba(255,20,147,0.2)'];
              var barColors_hover_bg = ['rgba(255,0,0,0.5)','rgba(255,102,0,0.5)','rgba(255,153,0,0.5)','rgba(255,215,0,0.5)',
                                        'rgba(255,255,51,0.5)','rgba(102,204,51,0.5)','rgba(51,153,51,0.5)','rgba(51,153,153,0.5)',
                                        'rgba(51,153,255,0.5)','rgba(0,51,153,0.5)','rgba(102,0,153,0.5)','rgba(199,21,133,0.5)',
                                        'rgba(255,20,147,0.5)'];
              var barColors_border = ['rgba(255,0,0,1)','rgba(255,102,0,1)','rgba(255,153,0,1)','rgba(255,215,0,1)',
                                      'rgba(255,255,51,1)','rgba(102,204,51,1)','rgba(51,153,51,1)','rgba(51,153,153,1)',
                                      'rgba(51,153,255,1)','rgba(0,51,153,1)','rgba(102,0,153,1)','rgba(199,21,133,1)',
                                      'rgba(255,20,147,1)'];
              let data = {
                  labels:owner_car,
                  datasets:[{
                      label:'',
                      data:count_car,
                      backgroundColor: barColors,
                      borderColor: barColors_border,
                      borderWidth: 2,
                      hoverBackgroundColor: barColors_hover_bg,
                      hoverBorderColor: barColors_border,                      
                      hoverOffset: 5,   
                  }]
              };
              var options = {
                          responsive:true,
                          maintainAspectRatio: true,
                          plugins:{
                              legend:{
                                  labels:{
                                      color: '#778899',
                                      font:{
                                          size: 14
                                      },
                                //   verticalAlign:"bottom",
                                  },
                                // display: false
                                } 
                          }
                             
              };
              let graphTarget = $('myChart_machine');
              let barGraph = new Chart(myChart_machine,{
                  type:'doughnut',
                  data:data,
                  options:options,
                  legend:{
                  } 
                  
              })
    }
    function ShowGraphMachine_Type_Bar(){
        var data_obj_smcar = @php echo json_encode($data_chart_count_machine_owner); @endphp;
            console.log(data_obj_smcar);
              let owner_car = [];
              let count_car = [];
              for(let i in data_obj_smcar){
                  owner_car.push(data_obj_smcar[i].owner);
                  count_car.push(data_obj_smcar[i]._c);
              }
            //   console.log(owner_car);
            //   console.log(count_car);
              var barColors = ['rgba(255,0,0,0.2)','rgba(255,102,0,0.2)','rgba(255,153,0,0.2)','rgba(255,215,0,0.2)',
                               'rgba(255,255,51,0.2)','rgba(102,204,51,0.2)','rgba(51,153,51,0.2)','rgba(51,153,153,0.2)',
                               'rgba(51,153,255,0.2)','rgba(0,51,153,0.2)','rgba(102,0,153,0.2)','rgba(199,21,133,0.2)',
                               'rgba(255,20,147,0.2)'];
              var barColors_hover_bg = ['rgba(255,0,0,0.5)','rgba(255,102,0,0.5)','rgba(255,153,0,0.5)','rgba(255,215,0,0.5)',
                                        'rgba(255,255,51,0.5)','rgba(102,204,51,0.5)','rgba(51,153,51,0.5)','rgba(51,153,153,0.5)',
                                        'rgba(51,153,255,0.5)','rgba(0,51,153,0.5)','rgba(102,0,153,0.5)','rgba(199,21,133,0.5)',
                                        'rgba(255,20,147,0.5)'];
              var barColors_border = ['rgba(255,0,0,1)','rgba(255,102,0,1)','rgba(255,153,0,1)','rgba(255,215,0,1)',
                                      'rgba(255,255,51,1)','rgba(102,204,51,1)','rgba(51,153,51,1)','rgba(51,153,153,1)',
                                      'rgba(51,153,255,1)','rgba(0,51,153,1)','rgba(102,0,153,1)','rgba(199,21,133,1)',
                                      'rgba(255,20,147,1)'];
              let data = {
                  labels:owner_car,
                  datasets:[{
                      label:'',
                      data:count_car,
                      backgroundColor: barColors,
                      borderColor: barColors_border,
                      borderWidth: 2,
                      hoverBackgroundColor: barColors_hover_bg,
                      hoverBorderColor: barColors_border,                      
                    //   hoverOffset: 20,   
                  }]
              };
              var options = {
                          responsive:true,
                          maintainAspectRatio: true,
                          plugins:{
                              legend:{
                                //   labels:{
                                    //   color: '#778899',
                                    //   font:{
                                    //       size: 14
                                    //   },
                                //   verticalAlign:"bottom",
                                //   },
                                display: false
                                } 
                          }
                             
              };
              let graphTarget = $('myChart_machine_bar');
              let barGraph = new Chart(myChart_machine_bar,{
                  type:'bar',
                  data:data,
                  options:options,
                  legend:{
                  } 
                  
              })
    }
    function ShowGraphTruck_Type_Doughnut(){
        var data_obj_smcar = @php echo json_encode($data_chart_count_truck_owner); @endphp;
            //console.log(data_obj_smcar);
              let owner_car = [];
              let count_car = [];
              for(let i in data_obj_smcar){
                  owner_car.push(data_obj_smcar[i].owner);
                  count_car.push(data_obj_smcar[i]._c);
              }
            //   console.log(owner_car);
            //   console.log(count_car);
              var barColors = ['rgba(255,0,0,0.2)','rgba(255,102,0,0.2)','rgba(255,153,0,0.2)','rgba(255,215,0,0.2)',
                               'rgba(255,255,51,0.2)','rgba(102,204,51,0.2)','rgba(51,153,51,0.2)','rgba(51,153,153,0.2)',
                               'rgba(51,153,255,0.2)','rgba(0,51,153,0.2)','rgba(102,0,153,0.2)','rgba(199,21,133,0.2)',
                               'rgba(255,20,147,0.2)'];
              var barColors_hover_bg = ['rgba(255,0,0,0.5)','rgba(255,102,0,0.5)','rgba(255,153,0,0.5)','rgba(255,215,0,0.5)',
                                        'rgba(255,255,51,0.5)','rgba(102,204,51,0.5)','rgba(51,153,51,0.5)','rgba(51,153,153,0.5)',
                                        'rgba(51,153,255,0.5)','rgba(0,51,153,0.5)','rgba(102,0,153,0.5)','rgba(199,21,133,0.5)',
                                        'rgba(255,20,147,0.5)'];
              var barColors_border = ['rgba(255,0,0,1)','rgba(255,102,0,1)','rgba(255,153,0,1)','rgba(255,215,0,1)',
                                      'rgba(255,255,51,1)','rgba(102,204,51,1)','rgba(51,153,51,1)','rgba(51,153,153,1)',
                                      'rgba(51,153,255,1)','rgba(0,51,153,1)','rgba(102,0,153,1)','rgba(199,21,133,1)',
                                      'rgba(255,20,147,1)'];
              let data = {
                  labels:owner_car,
                  datasets:[{
                      label:'',
                      data:count_car,
                      backgroundColor: barColors,
                      borderColor: barColors_border,
                      borderWidth: 2,
                      hoverBackgroundColor: barColors_hover_bg,
                      hoverBorderColor: barColors_border,                      
                    //   hoverOffset: 20,   
                  }]
              };
              var options = {
                          responsive:true,
                          maintainAspectRatio: true,
                          plugins:{
                              legend:{
                                  labels:{
                                      color: '#778899',
                                      font:{
                                          size: 14
                                      },
                                //   verticalAlign:"bottom",
                                  },
                                // display: false
                                } 
                          }
                             
              };
              let graphTarget = $('myChart_truck');
              let barGraph = new Chart(myChart_truck,{
                  type:'doughnut',
                  data:data,
                  options:options,
                  legend:{
                  } 
                  
              })
    }
    function ShowGraphTruck_Type_Bar(){
        var data_obj_smcar = @php echo json_encode($data_chart_count_truck_owner); @endphp;
            console.log(data_obj_smcar);
              let owner_car = [];
              let count_car = [];
              for(let i in data_obj_smcar){
                  owner_car.push(data_obj_smcar[i].owner);
                  count_car.push(data_obj_smcar[i]._c);
              }
            //   console.log(owner_car);
            //   console.log(count_car);
              var barColors = ['rgba(255,0,0,0.2)','rgba(255,102,0,0.2)','rgba(255,153,0,0.2)','rgba(255,215,0,0.2)',
                               'rgba(255,255,51,0.2)','rgba(102,204,51,0.2)','rgba(51,153,51,0.2)','rgba(51,153,153,0.2)',
                               'rgba(51,153,255,0.2)','rgba(0,51,153,0.2)','rgba(102,0,153,0.2)','rgba(199,21,133,0.2)',
                               'rgba(255,20,147,0.2)'];
              var barColors_hover_bg = ['rgba(255,0,0,0.5)','rgba(255,102,0,0.5)','rgba(255,153,0,0.5)','rgba(255,215,0,0.5)',
                                        'rgba(255,255,51,0.5)','rgba(102,204,51,0.5)','rgba(51,153,51,0.5)','rgba(51,153,153,0.5)',
                                        'rgba(51,153,255,0.5)','rgba(0,51,153,0.5)','rgba(102,0,153,0.5)','rgba(199,21,133,0.5)',
                                        'rgba(255,20,147,0.5)'];
              var barColors_border = ['rgba(255,0,0,1)','rgba(255,102,0,1)','rgba(255,153,0,1)','rgba(255,215,0,1)',
                                      'rgba(255,255,51,1)','rgba(102,204,51,1)','rgba(51,153,51,1)','rgba(51,153,153,1)',
                                      'rgba(51,153,255,1)','rgba(0,51,153,1)','rgba(102,0,153,1)','rgba(199,21,133,1)',
                                      'rgba(255,20,147,1)'];
              let data = {
                  labels:owner_car,
                  datasets:[{
                      label:'',
                      data:count_car,
                      backgroundColor: barColors,
                      borderColor: barColors_border,
                      borderWidth: 2,
                      hoverBackgroundColor: barColors_hover_bg,
                      hoverBorderColor: barColors_border,                      
                    //   hoverOffset: 20,   
                  }]
              };
              var options = {
                          responsive:true,
                          maintainAspectRatio: true,
                          plugins:{
                              legend:{
                                //   labels:{
                                    //   color: '#778899',
                                    //   font:{
                                    //       size: 14
                                    //   },
                                //   verticalAlign:"bottom",
                                //   },
                                display: false
                                } 
                          }
                             
              };
              let graphTarget = $('myChart_truck_bar');
              let barGraph = new Chart(myChart_truck_bar,{
                  type:'bar',
                  data:data,
                  options:options,
                  legend:{
                  } 
                  
              })
    }
    function ShowGraphGeneral_work_Type_Doughnut(){
        var data_obj_smcar = @php echo json_encode($data_chart_count_general_work_owner); @endphp;
            //console.log(data_obj_smcar);
              let owner_car = [];
              let count_car = [];
              for(let i in data_obj_smcar){
                  owner_car.push(data_obj_smcar[i].owner);
                  count_car.push(data_obj_smcar[i]._c);
              }
            //   console.log(owner_car);
            //   console.log(count_car);
              var barColors = ['rgba(255,0,0,0.2)','rgba(255,102,0,0.2)','rgba(255,153,0,0.2)','rgba(255,215,0,0.2)',
                               'rgba(255,255,51,0.2)','rgba(102,204,51,0.2)','rgba(51,153,51,0.2)','rgba(51,153,153,0.2)',
                               'rgba(51,153,255,0.2)','rgba(0,51,153,0.2)','rgba(102,0,153,0.2)','rgba(199,21,133,0.2)',
                               'rgba(255,20,147,0.2)'];
              var barColors_hover_bg = ['rgba(255,0,0,0.5)','rgba(255,102,0,0.5)','rgba(255,153,0,0.5)','rgba(255,215,0,0.5)',
                                        'rgba(255,255,51,0.5)','rgba(102,204,51,0.5)','rgba(51,153,51,0.5)','rgba(51,153,153,0.5)',
                                        'rgba(51,153,255,0.5)','rgba(0,51,153,0.5)','rgba(102,0,153,0.5)','rgba(199,21,133,0.5)',
                                        'rgba(255,20,147,0.5)'];
              var barColors_border = ['rgba(255,0,0,1)','rgba(255,102,0,1)','rgba(255,153,0,1)','rgba(255,215,0,1)',
                                      'rgba(255,255,51,1)','rgba(102,204,51,1)','rgba(51,153,51,1)','rgba(51,153,153,1)',
                                      'rgba(51,153,255,1)','rgba(0,51,153,1)','rgba(102,0,153,1)','rgba(199,21,133,1)',
                                      'rgba(255,20,147,1)'];
              let data = {
                  labels:owner_car,
                  datasets:[{
                      label:'',
                      data:count_car,
                      backgroundColor: barColors,
                      borderColor: barColors_border,
                      borderWidth: 2,
                      hoverBackgroundColor: barColors_hover_bg,
                      hoverBorderColor: barColors_border,                      
                    //   hoverOffset: 20,   
                  }]
              };
              var options = {
                          responsive:true,
                          maintainAspectRatio: true,
                          plugins:{
                              legend:{
                                  labels:{
                                      color: '#778899',
                                      font:{
                                          size: 14
                                      },
                                //   verticalAlign:"bottom",
                                  },
                                // display: false
                                } 
                          }
                             
              };
              let graphTarget = $('myChart_general_work');
              let barGraph = new Chart(myChart_general_work,{
                  type:'doughnut',
                  data:data,
                  options:options,
                  legend:{
                  } 
                  
              })
    }
    function ShowGraphGeneral_work_Type_Bar(){
        var data_obj_smcar = @php echo json_encode($data_chart_count_general_work_owner); @endphp;
            console.log(data_obj_smcar);
              let owner_car = [];
              let count_car = [];
              for(let i in data_obj_smcar){
                  owner_car.push(data_obj_smcar[i].owner);
                  count_car.push(data_obj_smcar[i]._c);
              }
            //   console.log(owner_car);
            //   console.log(count_car);
              var barColors = ['rgba(255,0,0,0.2)','rgba(255,102,0,0.2)','rgba(255,153,0,0.2)','rgba(255,215,0,0.2)',
                               'rgba(255,255,51,0.2)','rgba(102,204,51,0.2)','rgba(51,153,51,0.2)','rgba(51,153,153,0.2)',
                               'rgba(51,153,255,0.2)','rgba(0,51,153,0.2)','rgba(102,0,153,0.2)','rgba(199,21,133,0.2)',
                               'rgba(255,20,147,0.2)'];
              var barColors_hover_bg = ['rgba(255,0,0,0.5)','rgba(255,102,0,0.5)','rgba(255,153,0,0.5)','rgba(255,215,0,0.5)',
                                        'rgba(255,255,51,0.5)','rgba(102,204,51,0.5)','rgba(51,153,51,0.5)','rgba(51,153,153,0.5)',
                                        'rgba(51,153,255,0.5)','rgba(0,51,153,0.5)','rgba(102,0,153,0.5)','rgba(199,21,133,0.5)',
                                        'rgba(255,20,147,0.5)'];
              var barColors_border = ['rgba(255,0,0,1)','rgba(255,102,0,1)','rgba(255,153,0,1)','rgba(255,215,0,1)',
                                      'rgba(255,255,51,1)','rgba(102,204,51,1)','rgba(51,153,51,1)','rgba(51,153,153,1)',
                                      'rgba(51,153,255,1)','rgba(0,51,153,1)','rgba(102,0,153,1)','rgba(199,21,133,1)',
                                      'rgba(255,20,147,1)'];
              let data = {
                  labels:owner_car,
                  datasets:[{
                      label:'',
                      data:count_car,
                      backgroundColor: barColors,
                      borderColor: barColors_border,
                      borderWidth: 2,
                      hoverBackgroundColor: barColors_hover_bg,
                      hoverBorderColor: barColors_border,                      
                    //   hoverOffset: 20,   
                  }]
              };
              var options = {
                          responsive:true,
                          maintainAspectRatio: true,
                          plugins:{
                              legend:{
                                //   labels:{
                                    //   color: '#778899',
                                    //   font:{
                                    //       size: 14
                                    //   },
                                //   verticalAlign:"bottom",
                                //   },
                                display: false
                                } 
                          }
                             
              };
              let graphTarget = $('myChart_general_work_bar');
              let barGraph = new Chart(myChart_general_work_bar,{
                  type:'bar',
                  data:data,
                  options:options,
                  legend:{
                  } 
                  
              })
    }
  </script>