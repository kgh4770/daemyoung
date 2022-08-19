<?php
include 'connect.php';
Header("Content-type: application/vnd.ms-excel; charset=euc-kr");     
Header("Content-Disposition: attachment;  filename=apply_list_".date("Ymdhi").".xls");   
Header("Content-Description: PHP3 Generated Data"); 
Header("Pragma: no-cache"); 
Header("Expires: 0"); 
?>
					<table border=1>
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th style="display: flex; width: 130px;border-bottom: 1px solid #000000" scope="col">지원</th>
								<th scope="col">혜택선택이유</th>
								<th scope="col">Name</th>
								<th scope="col">Phone</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$rows=$obj->showAll2("job_application");
							foreach($rows as $key=>$info){
								extract($info);
								?>
								<tr>
									<td><?php echo $id; ?></td>
									<td><?php echo $job_title; ?></td>
									<td><?php echo $add_info; ?></td>
									<td><?php echo $first_name; ?></td>
									<td><?php echo $phone; ?></td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</tr>
				</table>
