$(document).ready(function() {

    const baseURL = "http://localhost/php-dev-challenge/cristian-kozlowski/public";
    let item = 0;

    $('.mask_price').mask("#.##0,00", {reverse: true});

    $('.mask_total_price').mask("#.##0,00", {reverse: true});

    function ajaxLoading(status) {

        if(status === "open") {

            $(".loading").css("display", "block");

        } else if(status === "close") {

            $(".loading").css("display", "none");
        }
    }

    function ajaxResponse(type, message) {
        let view = `<div class='message alert alert-${type}'>
                        ${message}
                        <div class='message_time'></div>
                    </div>`;

        let scrollDistance = document.documentElement.scrollTop;

        $(".order_callback").html(view);
        $(".message").animate({
            marginTop: `${scrollDistance}px`
        }, 500);
        // $(".message").effect("bounce", "slow");

        setTimeout(() => {
            $(".order_callback .message").fadeOut();
        }, 4500);
        return;
    }

    /** Add products */
    $('.add_product').on('click', function() {

        let bodyList = $('.list').find('tbody');
        let id  = $('#product').val();

        if(!id) {
            ajaxResponse("danger", "Escolha um produto para adicionar");
        } else {

            $.ajax({
                url: `${baseURL}/item-add/${id}`,
                type: 'get',
                beforeSend: function() {
                    ajaxLoading("open");
                },
                success: function(product) {
                    ajaxLoading("close");

                    let urlImage = `${baseURL}/storage/${product.path_image}`;

                    bodyList.append(`<tr>
                                        <td>
                                            <input type="hidden" name="product[${item}]" value="${product.id}" />
                                            ${product.id}
                                        </td>
                                        <td>${product.name}</td>
                                        <td>
                                            <img src="${urlImage}" width="50" height="auto" />
                                        </td>
                                        <td>${product.price}</td>
                                    </tr>`);
                    item++;
                    ajaxResponse("success", `${product.name} adicionado com sucesso!`);
                }
            });
        }
    });
})

