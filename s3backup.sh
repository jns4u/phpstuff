#!/bin/bash
cdate=`date`
echo "Backup to S3 bucket cmwav is started on $cdate"
aws s3 mv /mnt/hd3/sales-backup s3://cmwav/ --recursive
echo "Backup to S3 bucket cmwav is finished on $cdate"
