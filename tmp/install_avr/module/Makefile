# $Id: Makefile 867 2008-05-07 00:17:27Z Fritz Elfert $
#
PACKAGE = mod_avreloaded
VERSION = 1.0
DATE = $(shell date +%F)

ZIP = $(PACKAGE)-$(VERSION).zip
TGZ = $(PACKAGE)-$(VERSION).tar.gz
TBZ = $(PACKAGE)-$(VERSION).tar.bz2

SOURCES = Makefile mod_avreloaded.xml mod_avreloaded.php \
		  helper.php index.html $(wildcard tmpl/*) $(wildcard i18n/*)

%: %.in Makefile
	sed -e 's/_VERSION_/$(VERSION)/g' \
		-e 's/_DATE_/$(DATE)/g' < $< > $@

all: $(SOURCES)

updist: $(ZIP)
	cp $< ../

dist: $(ZIP) $(TGZ) $(TBZ)

zip: $(SOURCES)
	@rm -f $(ZIP)
	@zip -q $(ZIP) $(SOURCES)

$(ZIP): $(SOURCES) ChangeLog
	@rm -f $(ZIP)
	@zip -q $(ZIP) $(SOURCES) ChangeLog

$(TGZ): $(SOURCES) ChangeLog
	@tar czf $(TGZ) $(SOURCES) ChangeLog

$(TBZ): $(SOURCES) ChangeLog
	@tar cjf $(TBZ) $(SOURCES) ChangeLog

clean:
	@rm -f $(ZIP) $(TGZ) $(TBZ)

ChangeLog::
	svn up
	svn2cl -i --break-before-msg
