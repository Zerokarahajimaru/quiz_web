<head>

/* Styling dasar tabel */
table {
  width: 100%;
  border-collapse: collapse;
  margin: 20px 0;
  font-family: Arial, sans-serif;
  font-size: 14px;
  text-align: left;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  border-radius: 8px;
  overflow: hidden;
}

/* Header tabel */
table thead {
  background: #4CAF50;
  color: white;
}

table thead th {
  padding: 12px 15px;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

/* Body tabel */
table tbody tr {
  border-bottom: 1px solid #ddd;
}

table tbody tr:nth-child(even) {
  background-color: #f9f9f9;
}

table tbody tr:hover {
  background-color: #f1f1f1;
  transition: 0.2s;
}

table td {
  padding: 12px 15px;
}

/* Checkbox di tengah */
table td input[type="checkbox"] {
  transform: scale(1.2);
  cursor: pointer;
}

/* Responsive */
@media (max-width: 768px) {
  table, thead, tbody, th, td, tr {
    display: block;
  }
  thead {
    display: none;
  }
  tr {
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
  }
  td {
    display: flex;
    justify-content: space-between;
    padding: 8px;
  }
  td::before {
    content: attr(data-label);
    font-weight: bold;
    color: #333;
  }
}

</head>







<body>


    <form action="<?= base_url(); ?>" method="post">
        <table>
<tr>
    <th>nama</th>
    <th>barang</th>
    <th>harga</th>
</tr>
    




    <?php foreach($blabla as $x): ?>
    <tr>
        
        <td><input type="checkbox" name="id_harga_from_home"></td>
        
        
        <!-- read -->
        <td><?=""?></td>
        <td><?=""?></td>
        <td><?=""?></td>
        
    </tr>
<?php endforeach?>

</form>




<button>submit</button>

</table>
</body>