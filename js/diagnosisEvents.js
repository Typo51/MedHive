function create_tr(presc_id)
{
    let table_body = document.getElementById(presc_id),
    first_tr = table_body.firstElementChild;
    tr_clone = first_tr.cloneNode(true);
    table_body.append(tr_clone);
    console.log(tr_clone);
    
}