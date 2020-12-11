import * as error from '../foundations/error.js';
import * as loading from '../foundations/loading.js';
import { openPopUp } from './popup.js';



function ajaxEditPlan(form, event){
    $.ajax({
        url: "/php/responses/plans/update_plan_resp.php",
        type: "post",
        data:  new FormData(form),
        processData: false,
        contentType: false,
        beforeSend : function(){
            loading.showLoading('Actualizando plan');
        },
        success: function(data){
            console.log(data);
            if(!data.Error){
                Swal.fire({
                    icon: 'success',
                    title: 'Plan actualizado exitósamente',
                    willClose: () => {
                        location.reload();
                    },
                    
                    customClass: {
                        popup: 'normal-font-size'
                    }
                });
            }
            else{
                Swal.fire({
                    icon: 'warning',
                    title: 'No se ha podido actualizar el plan',
                    text: 'Algo ha salido mal. Por favor revisa lo ingresado e intenta nuevamente',
                    
                    customClass: {
                        popup: 'normal-font-size'
                    }
                });
            }
        },
        error: function(e) {
            error.showNetError(e);
        }          
    });
}

function planSubmit(form, event){
    ajaxEditPlan(form, event);
}

export function onPlanSubmit(form, event){

    event.preventDefault();

    planSubmit(form, event);

    return false;
}

export function editPlan(id, name, description, price){

    // Set inputs
    const inputId = document.getElementById('id');
    const inputName = document.getElementById('name');
    const inputDescription = document.getElementById('description');
    const inputPrice = document.getElementById('price');

    inputId.value = id;
    inputName.value = name;
    inputDescription.value = description;
    inputPrice.value = price;

    openPopUp();
}