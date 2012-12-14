#!/bin/bash

skinname=${1:-default}
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
SKINDIR="$DIR/../Wiki/skins/$skinname"
SASSDIR="$SKINDIR/scss"
PUBLICSKINDIR="$DIR/../../../../public/skins/$skinname"
PUBLICSKINCSSDIR="$PUBLICSKINDIR/css"


sass --watch $SASSDIR:$PUBLICSKINCSSDIR -r $SASSDIR/bourbon/lib/bourbon.rb --style=compressed