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

	THE_DICT_REVISED_SOURCE_DIR_PATH="$THE_VAR_DIR_PATH/dict_revised"
	mkdir -p "$THE_DICT_REVISED_SOURCE_DIR_PATH"
	cd "$THE_DICT_REVISED_SOURCE_DIR_PATH"


	## https://language.moe.gov.tw/001/Upload/Files/site_content/M0001/respub/dict_reviseddict_download.html

	wget -c 'https://language.moe.gov.tw/001/Upload/Files/site_content/M0001/respub/download/dict_revised_2015_20190329.zip'

	#unar 'dict_revised_2015_20190329.zip'

	unzip -O Big5 'dict_revised_2015_20190329.zip'

}

__main__ "$@"

##
### Tail: Main
################################################################################
