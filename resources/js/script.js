$(document).ready(function() {

    const baseURL = "http://localhost/php-dev-challenge/cristian-kozlowski/public";
    let item = 0;

    $('.mask_price').mask("#.##0,00", {reverse: true});

    $('.mask_total_price').mask("#.##0,00", {reverse: true});


    /** Add products */
    $('.add_product').on('click', function() {

        let bodyList = $('.list').find('tbody');
        let id  = $('#product').val();

        $.ajax({
            url: `${baseURL}/item-add/${id}`,
            type: 'get',
            success: function(product) {

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
            }
        });

    });
})

