<?php $baseUrl= Yii::app()->request->hostInfo . Yii::app()->request->baseUrl; 
$url = Yii::app()->request->hostInfo; ?>
ForumProperty.Net
By Christian Wahyudi, Era Tjandra Group

<?php echo $model->title ?>
<?php echo $model->bulan ?> <?php echo $model->part ?>

--------------------------------------------------------------------

<?php foreach ($model->property_id as $key => $value): ?>
<?php $property = Property::model()->findByPk($value); ?>
<?php echo $property->type ?> <?php echo $property->jenis ?> - <?php echo $property->area ?>:
<?php echo $property->name ?>

Bedroom: <?php echo $property->bedroom ?>

Shower: <?php echo $property->shower ?>

Car Port: <?php echo $property->carport ?>

Luas Tanah: <?php echo $property->luas_tanah ?>

Luas Bangunan: <?php echo $property->luas_bangunan ?>

Harga: <?php echo $property->bind ?><?php echo $property->bind_satuan ?>


--------------------------------------------------------------------

<?php endforeach ?>
Hubungi Christian di:
HP: 081 2352 7916, 031 7099 7273
PIN: 2937C1CF
Email: christian@forumproperty.net
Links: http://www.facebook.com/forumproperty

--------------------------------------------------------------------

Jika Anda merasa terganggu dengan email Christian, silahkan klik di
sini. 

--------------------------------------------------------------------

Powered by Mark Design.
