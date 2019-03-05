THEME        := VICE.tmTheme
SCRIPT       := maketheme.php
INSTALL_DEST := "$(HOME)/.config/sublime-text-3/Packages/Color Scheme - Default/$(THEME)"

$(THEME): $(SCRIPT)
	php $< > $@

install: $(THEME)
	install -Dm644 $(THEME) $(INSTALL_DEST)

debug:
	ls $(SCRIPT) | entr -s "make install"

clean:
	rm -f $(THEME)
