function setDatas() {
    const hoje = new Date();
    
    const anoHoje = hoje.getFullYear();
    const mesHoje = String(hoje.getMonth() + 1).padStart(2, '0');
    const diaHoje = String(hoje.getDate()).padStart(2, '0');
    const dataAtual = `${anoHoje}-${mesHoje}-${diaHoje}`;
    
    document.getElementById('data_pedido').value = dataAtual;
    
    const amanha = new Date(hoje);
    amanha.setDate(hoje.getDate() + 1);
    const anoAmanha = amanha.getFullYear();
    const mesAmanha = String(amanha.getMonth() + 1).padStart(2, '0');
    const diaAmanha = String(amanha.getDate()).padStart(2, '0');
    const dataEntrega = `${anoAmanha}-${mesAmanha}-${diaAmanha}`;
    
    document.getElementById('data_entrega').value = dataEntrega;
}

document.addEventListener('DOMContentLoaded', setDatas);