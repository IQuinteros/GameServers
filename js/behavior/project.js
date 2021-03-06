import * as error from '../foundations/error.js';
import * as loading from '../foundations/loading.js';

function newProject(form, event){
    $.ajax({
        url: "/php/responses/project/add_project_resp.php",
        type: "post",
        data:  $('#newproject').serialize(),
        beforeSend : function(){
            loading.showLoading('Actualizando datos');
        },
        success: function(data){
            console.log(data);
            if(!data.Error){
                onProjectClicked();
            }
            else{
                Swal.fire({
                    icon: 'warning',
                    title: 'No se ha podido crear el proyecto',
                    text: 'Algo ha ocurrido mal. Por favor revisa lo ingresado e intenta nuevamente',
                    
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

export function onNewProjectSubmit(form, event){
    event.preventDefault();

    newProject(form, event);

    return false;
}

function updateProject(form, event){
    $.ajax({
        url: "/php/responses/project/update_project_resp.php",
        type: "post",
        data:  $('#project').serialize(),
        beforeSend : function(){
            loading.showLoading('Actualizando proyecto');
        },
        success: function(data){
            console.log(data);
            if(!data.Error){
                Swal.fire({
                    icon: 'success',
                    title: 'Datos actualizados exitósamente',
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
                    title: 'No se ha podido actualizar el proyecto',
                    text: 'Algo ha ocurrido mal. Por favor revisa lo ingresado e intenta nuevamente',
                    
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

export function onProjectSubmit(form, event){
    event.preventDefault();

    updateProject(form, event);

    return false;
}