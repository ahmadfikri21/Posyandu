<div class="background-pk">
<div class="pembatas"></div>
<center>
<section class="table-background-pk">
        <table class ="table tabel-prak-dk">
            <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">ID JADWAL</th>
                <th scope="col">JAM PRAKTEK</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count=1;
            foreach($jadwal as $key){
                echo "<tr><td>".$count."</td>";
                echo "<td>".$key['id_jadwal']."</td>";
                echo "<td>".$key['jam_praktek']."</td></tr>";
                $count++;
            }
            ?>
            </tbody>
        </table>
</section> 
</center>
</div>
