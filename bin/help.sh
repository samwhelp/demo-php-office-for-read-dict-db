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

cat << EOF

Usage:

	$ make [target]

Example:

	$ make
	$ make help

	$ make asset-dict-revised
	$ make asset-dict-concised
	$ make asset-dict-mini
	$ make asset-dict-idioms

	$ make dict-concised-db-save
	$ make dict-concised-db-save-four
	$ make dict-concised-db-save-link
	$ make dict-concised-link-list


Debug:
	$ export DEBUG_TOOL=true

EOF

}

__main__ "$@"

##
### Tail: Main
################################################################################
