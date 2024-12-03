<?php
$produtos = [
    [
        'nome' => 'Peito de Frango',
        'categoria' => 'Carnes',
        'preco' => '19.99',
        'descricao' => 'peito de frango com osso sem pele kg'
    ],
    [
        'nome' => 'Leite Integral',
        'categoria' => 'Latícinios',
        'preco' => '5.19',
        'descricao' => 'Leite UHT Shefa Integral 1L'
    ],
    [
        'nome' => 'Carne moida',
        'categoria' => 'Frios',
        'preco' => '43.99',
        'descricao' => 'Patinho moído KG'
    ],
    [
        'nome' => 'Creme dental',
        'categoria' => 'Higiene Pessoal',
        'preco' => '15.99',
        'descricao' => 'Creme dental Colgate Sensitive Pro Alivio Imediadto 140g'
    ],
    [
        'nome' => 'Arroz',
        'categoria' => 'Grãos',
        'preco' => '7.99',
        'descricao' => 'Arroz tipo 1 prato fino 1kg'
    ]
];

require_once '../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();


$html = '
<h1>Relatório de Produtos</h1>
<p>Data de geração: 02/12/24 </p>
<table border="1" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>';

foreach ($produtos as $produto) {
    $html .= '
        <tr>
            <td>' . $produto['nome'] . '</td>
            <td>' . $produto['categoria'] . '</td>
            <td>' . $produto['preco'] . '</td>
            <td>' . $produto['descricao'] . '</td>
        </tr>';
}
// Fecha a tabela e finaliza o HTML
$html .= '</tbody></table>';


$mpdf->WriteHTML($html);
$mpdf->Output();
