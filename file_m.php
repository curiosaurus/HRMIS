
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<div class="container">
<hr>
		<div class="text-center">
		<?php 
				require_once "vendor/autoload.php";
				$client 	= new MongoDB\Client;
				$dataBase 	= $client->selectDatabase('companydb');
				$collection = $dataBase->selectCollection('upload');

	//        In this block access by session variable not by id
	
                
				$cursor = $collection->find(array('id' => '3'));
				foreach ($cursor as $obj) {
				
					$ext=explode('.',$obj["fileName"]);
					$filech=strtolower(end($ext));
					$img=array('png','jpg','jpeg');
					$pdf=array('pdf','docx');
					if(in_array($filech,$img))
					{
						?>
						<html>
						
						<img src="<?php print_r($obj["fileName"]);?>" height="100px" weight="100px">
						<button id="Delete" name="Delete" class="btn btn-primary">Delete </button>
			</img>
			</html>
							   
					   <?php	
                    // $deleteresult = $collection->deleteOne( $obj["fileName"] );
					}
					elseif(in_array($filech,$pdf))
					{
						?>
						<html>
						
						<embed src="<?php print_r($obj["fileName"]);?>" type="application/pdf" width="90%" height="600px" />
						<button id="Delete" name="Delete" class="btn btn-primary">Delete </button> 
					
			</img>
			</html>
							   
					   <?php	
					     // $deleteresult = $collection->deleteOne( $obj["fileName"] );
					}

                    
				}
				
				if(isset($_POST['create'])) {
			
					if($_FILES['file']) {
						if(move_uploaded_file($_FILES['file']['tmp_name'], 'upload/'.$_FILES['file']['name'])) {
							// give session variable and pass it to dataBase
							$data['fileName'] = 'upload/'.$_FILES['file']['name'];
						
						} else {
							echo "Failed to upload file.";
						}
					}

					$result = $collection->insertOne($data);

					if($result->getInsertedCount()>0) {
						echo "file is uploaded";
					} else {
						echo "File in not uploaded";
					}
				}?>
		</div>
		<div class="row">
		    <div class="col-md-4">
			    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					<fieldset>
						

						<!-- File input-->
						<div class="form-group" id="fileInput">
						  <label class="col-md-12" for="file">Select Image</label>  
						  <div class="col-md-12">
						  <input id="file" name="file" type="file" placeholder="" class="form-control input-md">
						  </div>
						</div>


						<button id="create" name="create" class="btn btn-primary">Create Article</button>
						
					</fieldset>
				</form>
		    </div>
	</div>
</body>
</html>
