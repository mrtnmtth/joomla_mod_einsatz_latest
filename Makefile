DATE=$(shell LC_ALL=en_GB.utf8 date +'%B %Y')
TAG=$(shell git describe --tags)
VERSION?=$(TAG:v%=%)-dev

ALL: build

.PHONY: clean build package

clean:
	rm -rf build
	rm -rf dist

build:
	yarnpkg build

package: build
	mkdir -p dist
	sed -e "s/<version>.*<\/version>/<version>${VERSION}<\/version>/g" \
        -e "s/<creationDate>.*<\/creationDate>/<creationDate>${DATE}<\/creationDate>/g" \
        mod_einsatz_latest.xml > dist/mod_einsatz_latest.xml
	zip -r dist/mod-einsatz-latest-v$(VERSION).zip css/ tmpl/ helper.php mod_einsatz_latest.php dist/mod_einsatz_latest.xml README.md
