if [ ! -f sami.phar ]; then
	echo "\nDownloading: http://get.sensiolabs.org/sami.phar\n" ;
	wget http://get.sensiolabs.org/sami.phar ;
fi
php sami.phar update samicfg.php ;
echo "\nRemoving: cache\n" ;
rm -r cache ;
