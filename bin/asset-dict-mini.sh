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

	THE_DICT_MINI_SOURCE_DIR_PATH="$THE_VAR_DIR_PATH/dict_mini"
	mkdir -p "$THE_DICT_MINI_SOURCE_DIR_PATH"
	cd "$THE_DICT_MINI_SOURCE_DIR_PATH"

	## https://language.moe.gov.tw/001/Upload/Files/site_content/M0001/respub/dict_mini_download.html

	wget -c 'https://language.moe.gov.tw/001/Upload/Files/site_content/M0001/respub/download/dict_mini_2008_20190331.zip'

	#unar 'dict_mini_2008_20190331.zip'

	unzip -O Big5 'dict_mini_2008_20190331.zip'

}

__main__ "$@"

##
### Tail: Main
################################################################################
