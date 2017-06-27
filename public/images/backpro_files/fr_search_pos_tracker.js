/**
 * Javascript code for Freepik Search Engine tracking logic
 */
(function(i) {
	var _frst = i[i["FreepikSearchTracking"]];

	_frst.o = {};
	_frst.e = {};
	_frst.q = _frst.q||[];

	/* Define las funciones necesarias */

	_frst.p = function(e) {
		if (e && 1 < e.length) {
			var n = e[0];
			if (n in this && "function" == typeof this[n]) {
				var d = [e[1]];
				for (var i=2;i<e.length;i++) {
					d.push(e[i]);
				}
				this[n](d);
			}
		}
	}

	_frst.set = function(d) {
		for(var k in d[0]) {
			if (d[0].hasOwnProperty(k)) {
				_frst.o[k] = d[0][k];
			}
		}
	}

	_frst.get = function(k,d) {
		if (k in _frst.o) {
			return _frst.o[k];
		}
		return d;
	}

	_frst._serialize = function(o) {
  		var s = [];
  		for (var p in o) {
    			if (o.hasOwnProperty(p)) {
      				s.push(encodeURIComponent(p) + "=" + encodeURIComponent(o[p]));
    			}
    		}
  		return s.join("&");
	}

	_frst._send = function(pf, a, qs) {
		var i = new Image();
		i.src = "https://trk.freepik.com/" + pf + "?a=" + a + "&" + this._serialize(qs);
	}

	/* Funciones públicas */
	_frst.track = function(t) {
		var f = "t_" + t.shift();
		if (f in _frst && "function" == typeof _frst[f]) {
			if (0 < t.length) {
				_frst.set(t);
			}
			_frst[f]();
		}
	}

	/* Subfunciones */
	_frst.t_addSearchResult = function() {
		let i = {};
		i.i = parseInt(_frst.get("id", 0));
		i.p = parseInt(_frst.get("pos", 0));

		if (0 < i.i && 0 < i.p) {
			_frst.e.items = _frst.e.items||[];
			_frst.e.items.push(i);
		}
	}

	_frst.t_searchView = function() {
		let i = {};
		i.term = _frst.get("term", "");
		i.vars = parseInt(_frst.get("page", 0));
		i.test = _frst.get("test", "A0");
		i.type = parseInt(_frst.get("type", 0));

		let r = _frst.e.items||[];
		if (i.term && 0 < i.vars && 0 <= i.type && Array.isArray(r) && 0 < r.length) {
			for (let j in r) {
				i['p' + r[j].p.toString()] = r[j].i;
			}
			this._send('search_positions.gif', 'searchView', i);
		}
	}

	_frst.t_numResults = function() {
		let i = {};
		i.term  	= _frst.get("term", "");
		i.vectors 	= parseInt(_frst.get("vectors", 0));
		i.photos  	= parseInt(_frst.get("photos", 0));
		i.psd	  	= parseInt(_frst.get("psd", 0));
		i.icons   	= parseInt(_frst.get("icons", 0));
		i.premium 	= parseInt(_frst.get("premium", 0));
		i.selection 	= parseInt(_frst.get("selection", 0));
		i.total	  	= parseInt(_frst.get("total", -1));

		if (i.term && 0 <= i.total) {
			this._send('search_positions.gif', 'numResults', i);
		}
	} 

	_frst.t_addNewItemView = function() {
		let i = {};
		i.i = parseInt(_frst.get("id", 0));
                i.p = parseInt(_frst.get("pos", 0));
		
		let t = parseInt(_frst.get("time", 0));

                if (0 < i.i && 0 < i.p && t > (Math.floor(new Date().getTime()/1000) - (30*24*3600))) {
                        _frst.e.new_items = _frst.e.new_items||[];
                        _frst.e.new_items.push(i);
                }
	}

	_frst.t_newItemsView = function() {
		let i = {};
                i.term = _frst.get("term", "");
                i.vars = parseInt(_frst.get("page", 0));
                i.test = _frst.get("test", "A0");
                i.type = parseInt(_frst.get("type", 0));

                let r = _frst.e.new_items||[];
                if (i.term && 0 < i.vars && 0 <= i.type && Array.isArray(r) && 0 < r.length) {
                        for (let j in r) {
                                i['p' + r[j].p.toString()] = r[j].i;
                        }
                        this._send('search_positions.gif', 'newItemsView', i);
                }
	}

	_frst.t_newItemClick = function() {
                let i = {};
                i.term     = _frst.get("term", "");
                i.id_photo = parseInt(_frst.get("id", 0));
		i.vars     = parseInt(_frst.get("page", 0));
                i.test     = _frst.get("test", "A0");
                i.type     = parseInt(_frst.get("type", 0));
		
		let t = parseInt(_frst.get("time", 0));

                if (i.term && 0 < i.id_photo && 0 < i.vars && 0 <= i.type && t > (Math.floor(new Date().getTime()/1000) - (30*24*3600))) {
                        this._send('search_positions.gif', 'newItemClick', i);
                }
        }

	_frst.q.push = function() {
                if (0 < arguments.length) {
                        _frst.p(arguments[0]);
                        return Array.prototype.push.call(this, arguments);
                }
        }
	
	// Ejecuta la cola de funciones
	let l = _frst.q.length;
	for (let idx = 0; idx < l; idx++) {
		_frst.p(_frst.q[idx]);
	}

})(window);
