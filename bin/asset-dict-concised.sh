#!/usr/bin/env bash


################################################################################
### Head: Init
##

THE_BASE_DIR_PATH=$(cd -P -- "$(dirname -- "$0")" && pwd -P)
THE_BASE_DIR_PATH="$THE_BASE_DIR_PATH/../ext"
source "$THE_BASE_DIR_PATH/init.sh"

##
### Tail: Init
################################################################################


################################################################################
### Head: Main
##

__main__ () {

	THE_DICT_CONCISED_SOURCE_DIR_PATH="$THE_VAR_DIR_PATH/dict_concised"
	mkdir -p "$THE_DICT_CONCISED_SOURCE_DIR_PATH"
	cd "$THE_DICT_CONCISED_SOURCE_DIR_PATH"

	## https://language.moe.gov.tw/001/Upload/Files/site_content/M0001/respub/dict_concised_download.html

	wget -c 'https://language.moe.gov.tw/001/Upload/Files/site_content/M0001/respub/download/dict_concised_2014_20190411.zip'

	#unar 'dict_concised_2014_20190411.zip'

	unzip -O Big5 'dict_concised_2014_20190411.zip'

}

__main__ "$@"

##
### Tail: Main
################################################################################
