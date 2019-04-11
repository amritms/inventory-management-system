<h1>This is product index page</h1>
<table border="1">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Category</th>
        <th>Description</th>
        <th>price</th>
        <th>Actions</th>
    </tr>

<?php foreach($products as $product){ ?>
   <td><?php echo $product->id;?></td>
   <td><?php echo $product->name;?></td>
   <td><?php echo $product->category_id;?></td>
   <td><?php echo $product->description;?></td>
   <td><?php echo $product->price;?></td>

<?php } ?>


</table>
