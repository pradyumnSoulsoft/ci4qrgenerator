let stockList = new Map();
let gasList = new Map();


function getCreateCylinder(){
    $.ajax({

        url: ebase_url+'user/stock_api',

        type: 'GET',

        async:false,

        headers: {
            "Authorization": etoken
        },

        dataType: 'json',

        success: function (response) {
        

            if (response.status == 200) {

                if (response.data.lenght != 0) {
                    for (var i = 0; i < response.data.length; i++) {
                        stockList.set(response.data[i].id, response.data[i]);
                    }
                    
                }
                setCreateCylinder(stockList);
            }
            else {
                // If there is no data or an error occurred
                var tableBody = $('#dashboardList');
                var noDataRow = '<tr><td colspan="8" style="text-align: center;">No data available</td></tr>';
                tableBody.append(noDataRow);
            }

        }

    });
}
getCreateCylinder();


function setCreateCylinder(list){

    console.log('stock:',list);

    $('#dashboardTable').dataTable().fnDestroy();
    $('#dashboardList').empty();
    var tblData = '', index=1;

    for (let k of list.keys()) {
        
        let stock = list.get(k);

        tblData += `
        <tr>
                <td>` + (index++) + `</td>
                <td>` + stock.barcode + `</td>
                <td>` + stock.dept_name + `</td>
                <td>` + stock.gas_name + `</td>
                <td>` + stock.date + `</td>
                
                </tr>`            
    }
                // <td> <a href="#" onclick="viewStockDetails(${stock.id})" title="View"><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> 
                
                // </td>

    $('#dashboardList').html(tblData);
    $('#dashboardTable').DataTable();
    
}

function viewStockDetails(id){
    let stock = stockList.get(id.toString());
    console.log('gas id: ',stock.gas_id)
    // var selectedGasId = stock.gas_id;
    // var selectedStkLocId = stock.stock_location;
    // console.log('selectedGasId: ',selectedGasId)

    // getGas(selectedGasId);
    // getLocation(selectedStkLocId);

    
    $('#id').val('');
    $('#manufacturer_name').val('');
    $('#barcode').val('');
    $('#stk_loc').val('').change();
    $('#cylSize').val('');
    $('#cylHeight').val('');
    $('#gasName').val('').change();
    $('#date').val('');
    
    $('#barcode').val(stock.barcode).prop('disabled', true);
    $('#manufacturer_name').val(stock.manufacturer_name).prop('disabled', true);
    // $('#manufacturer_name').val(stock.manufacturer_name);
    $('#cylSize').val(stock.cylinder_gas_filling_size).prop('disabled', true);
    $('#cylHeight').val(stock.cylinder_height).prop('disabled', true);
    // $('#gasName').val(stock.gas_id).change().prop('disabled', true);
    // $('#stk_loc').val(stock.stock_location).change().prop('disabled', true);
    $('#date').val(stock.date).prop('disabled', true);
    $('#id').val(stock.id);

    $('#addDashboardModal').modal('toggle');
}
// $('#uclientName option:selected').text().trim();

