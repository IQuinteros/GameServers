import * as error from '../foundations/error.js';
import * as loading from '../foundations/loading.js';

export async function onDeleteClients(selected){
    if(selected.length <= 0){
        Swal.fire({
            icon: 'warning',
            title: 'Eliminar cuentas',
            text: `No tienes cuentas de clientes por eliminar`,
            customClass: {
                popup: 'normal-font-size'
            }
        });
        return;
    }

    Swal.fire({
        icon: 'warning',
        title: 'Eliminar cuentas',
        text: `Vas a eliminar ${selected.length} cuentas de clientes`,
        showCancelButton: true,
        confirmButtonText: `Eliminar ítems`,
        confirmButtonColor: '#C92020',
        customClass: {
            popup: 'normal-font-size'
        }
    }).then((result) => {
        if (result.isConfirmed) {

            // Parse selected items
            let dataToSend = '';
            for(let i = 0; i < selected.length; i++){
                dataToSend = dataToSend + `items%5B${i}%5D=${selected[i].id}`;

                if(!(i >= selected.length - 1)){
                    dataToSend = dataToSend + '&';
                }
            }

            $.ajax({
                url: "/php/responses/user/delete_users_resp.php",
                type: "post",
                data: dataToSend,
                beforeSend : function(){
                    loading.showLoading('Eliminando cuentas de clientes');
                },
                success: function(data){
                    if(data.result){
                        Swal.fire({
                            icon: 'success',
                            title: 'Cuentas eliminadas satisfactoriamente',
                            text: `${selected.length} cuentas fueron eliminadas`,
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
                            title: 'Hubo un problema',
                            text: data.Error,
                            
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
    });
}

export async function onExportClients(selected){
    if(selected.length <= 0){
        Swal.fire({
            icon: 'warning',
            title: 'Exportar PDF',
            text: `No tienes cuentas de clientes por exportar`,
            customClass: {
                popup: 'normal-font-size'
            }
        });
        return;
    }

    let url = 'http://gameservers.test/php/services/pdf/clients_pdf.php?';


    for(let i = 0; i < selected.length; i++){
        url += `items[${i}]=${selected[i].id}&`;
    }

    selected.slice(0 , -1);

    window.open(url, '_blank');

}

export function displayClientInfo(id){ 
    const getData = window.loadedData.find(elem => elem.id == id);

    let imageUrl = getData.image;
    if(imageUrl == null){ imageUrl = '/assets/images/profile.png'; }
    
    Swal.fire({
        title: getData.name,
        imageUrl: imageUrl, 
        imageWidth: 200,
        imageHeight: 200,
        imageAlt: 'Imagen de cliente',
        html: `<br><b>Email:</b> ${getData.email} <br><br>` + 
            `<b>Miembros de equipo:</b> ${getData.membersNum} <br><br>` +
            `<b>Número de contacto:</b> ${getData.contactNum} <br><br>` +
            `<b>Ubicación:</b> ${getData.location} <br><br>` +
            `<b>Fecha de registro:</b> ${getData.registerDate} <br><br>` +
            `<b>Última conexión:</b> ${getData.lastConnectionDate} <br><br>`,
        customClass: {
            popup: 'normal-font-size',
            image: 'circle-image box-shadow'
        }
    });
}