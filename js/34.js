var jQuery_formValidator_initConfig;
(function(a) {
	a.formValidator = {
		grouplist: [],
		sustainType: function(c, d) {
			var e = a("#" + c).get(0),
				f = e.tagName;
			e = e.type;
			switch (d.validatetype) {
			case "InitValidator":
				return true;
			case "InputValidator":
				return f == "INPUT" || f == "TEXTAREA" || f == "SELECT" ? true : false;
			case "CompareValidator":
				if (f == "INPUT" || f == "TEXTAREA") return e == "checkbox" || e == "radio" ? false : true;
				return false;
			case "AjaxValidator":
				return e == "text" || e == "textarea" || e == "file" || e == "password" || e == "select-one" ? true : false;
			case "RegexValidator":
				if (f == "INPUT" || f == "TEXTAREA") return e == "checkbox" || e == "radio" ? false : true;
				return false;
			case "FunctionValidator":
				return true;
			case "GroupValidator":
				return true
			}
		},
		initConfig: function(c) {
			var d = {
				debug: false,
				validatorgroup: "1",
				alertmessage: false,
				validobjectids: "",
				forcevalid: false,
				onsuccess: function() {
					return true
				},
				onerror: function() {},
				submitonce: false,
				formid: "",
				autotip: false,
				tidymode: false,
				errorfocus: true,
				wideword: true,
				btnid: "",
				fun: null
			};
			c = c || {};
			a.extend(d, c);
			if (d.tidymode) d.errorfocus = false;
			d.formid != "" && a("#" + d.formid).submit(function() {
				try {
					typeof _gaq != "undefined" && _gaq.push(["pageTracker._trackEvent", "58-post", "click", "btn-post"])
				} catch (e) {}
				if (a.formValidator.pageIsValid("1")) if (d.fun) if (d.fun()) a.formValidator.subform(d.formid, d.btnid);
				else return false;
				else a.formValidator.subform(d.formid, d.btnid);
				return false
			});
			if (jQuery_formValidator_initConfig == null) jQuery_formValidator_initConfig = [];
			jQuery_formValidator_initConfig.push(d)
		},
		subform: function(c, d) {
			if (a.c.verifycode.submitBefore()) {
				var e = a.mobileReg.submitBefore();
				if (e != 0) if (e == 2) setTimeout(function() {
					a.formValidator.subform(c, d)
				}, 1E3);
				else a.c.user.user_reglogin(c, d) || a.formValidator.subform_submit(c, d)
			}
		},
		subform_submit: function(c, d) {
			try {
				typeof _gaq != "undefined" && _gaq.push(["pageTracker._trackEvent", "58-post", "click", "btn-post-valid"])
			} catch (e) {}
			var f = a("#" + c).get(0),
				g = a("#" + d).get(0);
			a.formValidator.gobalsokey_setvalue(c);
			a.c.fk.s(c);
			try {
				a.j.createFieldForTextJoinValue(f)
			} catch (h) {}
			try {
				a.c.Uploader.stopUploading()
			} catch (j) {}
			try {
				a.c.Uploader.setPicValue()
			} catch (k) {}
			g.disabled = true;
			g.value = "\u6b63\u5728\u53d1\u5e03...";
			try {
				if (____json4fe.catentry[0].listname == "house" || ____json4fe.catentry[0].listname == "sale") a.bll.keywords.getdata()
			} catch (l) {}
			g = window.location.href;
			g = g.replace(location.search, "");
			f.action = g + "/submit";
			f.target = "formSubmit";
			f.submit()
		},
		gobalsokey_setvalue: function(c) {
			try {
				var d = [];
				a.each(a("[f]"), function(g, h) {
					var j = a("#" + h.id).attr("f");
					if (j) {
						var k = a.j.getFullTextSearchVal(h.id);
						if (k) {
							k = j.replace(/\{0\}/g, k);
							d.push(k)
						}
					}
				});
				var e = d.join("|");
				e = a.bll.keywords.joinContentKeyword(e);
				a("#gobalsokey").length == 0 ? a("#" + c).append('<input name="gobalsokey" id="gobalsokey" type="hidden" value="' + e + '"/>') : a("#gobalsokey").val(e)
			} catch (f) {}
		},
		subfalse: function(c, d) {
			var e = a("#" + d).get(0);
			e.disabled = false;
			e.value = a.formValidator.getfabuValue();
			if (a("#postRegLogin").val() == "2") e.value = "\u6ce8\u518c\u5e76\u53d1\u5e03";
			a.c.verifycode.reloadcode()
		},
		getfabuValue: function() {
			return "\u9a6c\u4e0a\u53d1\u5e03"
		},
		appendValid: function(c, d) {
			if (!a.formValidator.sustainType(c, d)) return -1;
			var e = a("#" + c).get(0);
			if (d.validatetype == "InitValidator" || e.settings == undefined) e.settings = [];
			var f = e.settings.push(d);
			e.settings[f - 1].index = f - 1;
			return f - 1
		},
		getInitConfig: function(c) {
			if (jQuery_formValidator_initConfig != null) for (i = 0; i < jQuery_formValidator_initConfig.length; i++) if (c == jQuery_formValidator_initConfig[i].validatorgroup) return jQuery_formValidator_initConfig[i];
			return null
		},
		triggerValidate: function(c) {
			a.formValidator.trimTextBox(c);
			switch (c.setting.validatetype) {
			case "InputValidator":
				a.formValidator.inputValid(c);
				break;
			case "CompareValidator":
				a.formValidator.compareValid(c);
				break;
			case "AjaxValidator":
				a.formValidator.ajaxValid(c);
				break;
			case "RegexValidator":
				a.formValidator.regexValid(c);
				break;
			case "FunctionValidator":
				a.formValidator.functionValid(c);
				break;
			case "GroupValidator":
				a.formValidator.groupValid(c);
				break
			}
		},
		trimTextBox: function(c) {
			c = a("#" + c.id);
			if (c.length > 0) {
				var d = c.get(0).tagName.toUpperCase();
				if (d == "INPUT" && c.get(0).type.toUpperCase() == "TEXT" || d == "TEXTAREA") {
					d = a.trim(c.val());
					c.val(d)
				}
			}
		},
		setTipState: function(c, d, e, f) {
			a.j.isTextBox(c) && a(c).removeClass("wrong_color").addClass("action_color");
			if (f) c = a("#" + f);
			else {
				c = c.settings[0];
				a.formValidator.getInitConfig(c.validatorgroup);
				c = a("#" + c.tipid)
			}
			if (!(e == null || e == "")) {
				c.removeClass();
				if (d == "onError") c.html('<span class="c2"><span class="action_po"><span class="action_po_top">' + e + '</span><span class="action_po_bot"></span></span></span>');
				else if (d == "onCorrect") {
					c.addClass("chenggong");
					c.html("")
				} else if (d == "clear") {
					c.addClass("");
					c.html("")
				} else {
					c.addClass("action_po_top");
					c.html('<span class="c1"><span class="action_po"><span class="action_po_top">' + e + '</span><span class="action_po_bot"></span></span></span>')
				}
			}
		},
		resetTipState: function(c) {
			c = a.formValidator.getInitConfig(c);
			a(c.validobjectids).each(function() {
				a.formValidator.setTipState(this, "onShow", this.settings[0].onshow)
			})
		},
		setFailState: function(c, d) {
			var e = a("#" + c);
			e.removeClass();
			e.addClass("onError");
			e.html(d)
		},
		showMessage: function(c) {
			var d = c.id,
				e = a("#" + d).get(0),
				f = c.isvalid,
				g = c.setting,
				h = "",
				j = "";
			j = a("#" + d).get(0).settings;
			var k = a.formValidator.getInitConfig(j[0].validatorgroup);
			if (f) {
				c.empty || a("#" + d).css("display") == "none" ? a.formValidator.setTipState(e, "clear", " ") : a.formValidator.setTipState(e, "onCorrect", " ");
				a.j.isTextBox(e) && a(e).removeClass("action_color").removeClass("wrong_color")
			} else {
				j = "onError";
				if (g.validatetype == "AjaxValidator") if (g.lastValid == "") {
					j = "onLoad";
					h = g.onwait
				} else h = g.onerror;
				else h = c.errormsg == "" ? g.onerror : c.errormsg;
				if (k.alertmessage) {
					e = a("#" + d).get(0);
					e.validoldvalue != a(e).val() && alert(h)
				} else a.formValidator.setTipState(e, j, h);
				a.j.isTextBox(e) && a(e).removeClass("action_color").addClass("wrong_color")
			}
			return h
		},
		showAjaxMessage: function(c) {
			var d = c.setting,
				e = a("#" + c.id).get(0);
			if (e.validoldvalue != a(e).val()) a.formValidator.ajaxValid(c);
			else {
				if (d.isvalid != undefined && !d.isvalid) {
					e.lastshowclass = "onError";
					e.lastshowmsg = d.onerror
				}
				a.formValidator.setTipState(e, e.lastshowclass, e.lastshowmsg)
			}
		},
		getLength: function(c) {
			var d = a("#" + c),
				e = d.get(0);
			sType = e.type;
			c = 0;
			switch (sType) {
			case "text":
			case "hidden":
			case "password":
			case "textarea":
			case "file":
				d = d.val();
				if (a.formValidator.getInitConfig(e.settings[0].validatorgroup).wideword) for (e = 0; e < d.length; e++) if (d.charCodeAt(e) >= 19968 && d.charCodeAt(e) <= 40869) c += 2;
				else c++;
				else c = d.length;
				break;
			case "checkbox":
			case "radio":
				c = a("input[type='" + sType + "'][name='" + d.attr("name") + "'][checked]").length;
				break;
			case "select-one":
				c = e.options ? e.options.selectedIndex : -1;
				break;
			case "select-multiple":
				c = a("select[name=" + e.name + "] option[selected]").length;
				break
			}
			return c
		},
		isEmpty: function(c) {
			return a("#" + c).get(0).settings[0].empty && a.formValidator.getLength(c) == 0 ? true : false
		},
		isOneValid: function(c) {
			return a.formValidator.oneIsValid(c, 1).isvalid
		},
		oneIsValid: function(c, d, e) {
			if (e == undefined) e = 1;
			var f = {};
			f.id = c;
			f.ajax = -1;
			f.errormsg = "";
			f.defaultval = "";
			f.nextgroupid = "";
			f.tag = e;
			f.empty = false;
			var g = a("#" + c).get(0);
			e = a("#" + c);
			g = g.settings;
			var h = g.length;
			if (h == 1) g[0].bind = false;
			if (!g[0].bind) return null;
			for (var j = 0; j < h; j++) if (j == 0) {
				if (g[0].defaultvalue) f.defaultval = g[0].defaultvalue;
				if (a.formValidator.isEmpty(c) || f.defaultval != "" && e.val() == f.defaultval || e.css("display") == "none" || a("#" + c + ":hidden").length > 0) {
					f.isvalid = true;
					f.setting = g[0];
					if (a.formValidator.isEmpty(c)) f.empty = true;
					var k = false;
					d = 0;
					a.each(g, function(l, m) {
						if (m.validatetype == "GroupValidator") {
							d = l;
							k = true;
							return false
						}
					});
					if (k) {
						f.setting = g[d];
						a.formValidator.triggerValidate(f)
					}
					break
				}
				g[0].q2b && e.val(a.formValidator.QtoB(e.val()));
				f.empty = g[0].empty
			} else {
				f.setting = g[j];
				if (g[j].validatetype != "AjaxValidator") a.formValidator.triggerValidate(f);
				else f.ajax = j;
				if (g[j].isvalid) {
					f.isvalid = true;
					f.setting = g[0];
					if (g[j].validatetype == "AjaxValidator") break
				} else {
					f.isvalid = false;
					f.setting = g[j];
					break
				}
			}
			return f
		},
		pageIsValid: function(c) {
			if (c == null || c == undefined) c = "1";
			var d = true,
				e = "",
				f, g, h = "^",
				j = a.formValidator.getInitConfig(c);
			a(j.validobjectids).each(function(k, l) {
				if (a.debug) if (l.settings == null) {
					alert(l.id);
					return
				}
				if (l.settings[0].bind) if (g = a.formValidator.oneIsValid(l.id, 1)) {
					var m = l.settings[0].tipid;
					if (!g.isvalid) {
						d = false;
						if (e == "") {
							e = g.id;
							f = g.errormsg == "" ? g.setting.onerror : g.errormsg
						}
					}
					if (!j.alertmessage) if (h.indexOf("^" + m + "^") == -1) if (!g.isvalid) {
						h = h + m + "^";
						a.formValidator.showMessage(g)
					}
				}
			});
			if (d) {
				d = j.onsuccess();
				j.submitonce && a("input[type='submit']").attr("disabled", true)
			} else {
				c = a("#" + e).get(0);
				j.onerror(f, c);
				if (e != "" && j.errorfocus) {
					c = getTopLeft(e);
					parent ? parent.window.scrollTo(c.left, c.top) : window.scrollTo(c.left, c.top)
				}
			}
			return !j.debug && d
		},
		ajaxValid: function(c) {
			var d = c.id,
				e = a("#" + d),
				f = e.get(0),
				g = f.settings,
				h = g[c.ajax],
				j = h.url;
			if (e.size() == 0 && g[0].empty) {
				c.setting = g[0];
				c.isvalid = true;
				a.formValidator.showMessage(c);
				h.isvalid = true
			} else {
				if (h.addidvalue) {
					d = "clientid=" + d + "&" + d + "=" + encodeURIComponent(e.val());
					j += j.indexOf("?") > 0 ? "&" + d : "?" + d
				}
				a.ajax({
					mode: "abort",
					type: h.type,
					url: j,
					cache: h.cache,
					data: h.data,
					async: h.async,
					dataType: h.datatype,
					success: function(k) {
						if (h.success(k)) {
							a.formValidator.setTipState(f, "onCorrect", g[0].oncorrect);
							h.isvalid = true
						} else {
							a.formValidator.setTipState(f, "onError", h.onerror);
							h.isvalid = false
						}
					},
					complete: function() {
						h.buttons && h.buttons.length > 0 && h.buttons.attr({
							disabled: false
						})
					},
					beforeSend: function(k) {
						h.buttons && h.buttons.length > 0 && h.buttons.attr({
							disabled: true
						});
						if (k = h.beforesend(k)) {
							h.isvalid = false;
							a.formValidator.setTipState(f, "onLoad", g[c.ajax].onwait)
						}
						h.lastValid = "-1";
						return k
					},
					error: function() {
						a.formValidator.setTipState(f, "onError", h.onerror);
						h.isvalid = false;
						h.error()
					},
					processData: h.processdata
				})
			}
		},
		regexValid: function(c) {
			var d = c.id,
				e = c.setting;
			a("#" + d).get(0);
			var f = a("#" + d).get(0);
			d = a("#" + d).val();
			if (!(f.settings[0].empty && f.value == "")) {
				f = e.regexp;
				if (e.datatype == "enum") f = eval("regexEnum." + f);
				if (f == undefined || f == "") {
					e.isvalid = true;
					return
				}
				f = f.split("#");
				for (var g = e.onerror.split("#"), h = 0; h < f.length; h++) if (!(f[h] == "" && f[h] == null)) {
					try {
						rex = new RegExp(f[h], "ig")
					} catch (j) {
						alert(j);
						return true
					}
					if (!rex.test(d)) {
						e.isvalid = false;
						c.errormsg = g[h];
						return
					}
				}
			}
			e.isvalid = true
		},
		functionValid: function(c) {
			var d = c.setting,
				e = a("#" + c.id);
			e = d.fun(e.val(), e.get(0));
			if (e != undefined) if (typeof e == "string") {
				d.isvalid = false;
				c.errormsg = e
			} else d.isvalid = e
		},
		inputValid: function(c) {
			var d = c.id,
				e = c.setting,
				f = a("#" + d),
				g = f.get(0),
				h = f.val();
			g = g.type;
			d = a.formValidator.getLength(d);
			var j = e.empty,
				k = false;
			switch (g) {
			case "text":
			case "hidden":
			case "password":
			case "textarea":
			case "file":
				if (e.type == "size") {
					j = e.empty;
					if (!j) if (h.replace(/(^\s*)|(\s*$)/g, "").length == 0) k = true;
					if (k) {
						c.errormsg = e.onerror;
						e.isvalid = false
					} else e.isvalid = true
				}
				break;
			case "checkbox":
			case "select-one":
			case "select-multiple":
			case "radio":
				j = false;
				if (g == "select-one" || g == "select-multiple") e.type = "size";
				g = e.type;
				if (g == "size") {
					k || (j = true);
					if (j) h = d
				} else if (g == "date" || g == "datetime") {
					if (g == "date") j = isDate(h);
					if (g == "datetime") j = isDate(h);
					if (j) {
						h = new Date(h);
						e.min = new Date(e.min);
						e.max = new Date(e.max)
					}
				} else if (g == "checkbox") {
					j = true;
					h = a(":checkbox[name='" + f.attr("name") + "'][checked]").length
				} else if (g == "select") {
					j = true;
					h = a(":select[name='" + f.attr("name") + "'][selected]").length
				} else if (g == "radio") {
					j = true;
					h = a(":radio[name='" + f.attr("name") + "'][checked]").length
				} else {
					stype = typeof e.min;
					if (stype == "number") {
						h = (new Number(h)).valueOf();
						isNaN(h) || (j = true)
					}
					if (stype == "string") j = true
				}
				e.isvalid = false;
				if (j) if (h < e.min || h > e.max) {
					if (h < e.min && e.onerrormin) c.errormsg = e.onerrormin;
					if (h > e.min && e.onerrormax) c.errormsg = e.onerrormax
				} else e.isvalid = true;
				break
			}
		},
		compareValid: function(c) {
			var d = c.setting,
				e = a("#" + c.id),
				f = a("#" + d.desid);
			c = d.datatype;
			d.isvalid = false;
			curvalue = e.val();
			ls_data = f.val();
			if (c == "number") {
				if (!isNaN(curvalue) && !isNaN(ls_data)) {
					curvalue = parseFloat(curvalue);
					ls_data = parseFloat(ls_data)
				} else return;
				if (f.val() == undefined || f.val() == "") {
					d.isvalid = true;
					return
				}
			}
			if (c == "date" || c == "datetime") {
				e = false;
				if (c == "date") e = a.formValidator.isDate(curvalue) && a.formValidator.isDate(ls_data);
				if (c == "datetime") e = isDateTime(curvalue) && isDateTime(ls_data);
				if (e) {
					curvalue = (new Date(curvalue.replace(/-/ig, "/"))).getTime();
					ls_data = (new Date(ls_data.replace(/-/ig, "/"))).getTime()
				} else {
					d.isvalid = true;
					return
				}
			}
			switch (d.operateor) {
			case "=":
				if (curvalue == ls_data) d.isvalid = true;
				break;
			case "!=":
				if (curvalue != ls_data) d.isvalid = true;
				break;
			case ">":
				if (curvalue > ls_data) d.isvalid = true;
				break;
			case ">=":
				if (curvalue >= ls_data) d.isvalid = true;
				break;
			case "<":
				if (curvalue < ls_data) d.isvalid = true;
				break;
			case "<=":
				if (curvalue <= ls_data) d.isvalid = true;
				break
			}
		},
		groupValid: function(c) {
			var d = c.setting;
			if (c.tag == 1) d.isvalid = true;
			else {
				d = c.setting.nextgroupid;
				for (var e = c.setting.groupName, f, g = a.formValidator.grouplist, h = 0; h < g.length; h++) if (g[h].groupname == e) {
					f = g[h];
					break
				}
				if (c.tag == 2) {
					f = {
						groupname: e,
						firstid: c.id,
						errorcount: 0
					};
					g = a.formValidator.removeArray(g, e);
					g.push(f);
					a.formValidator.grouplist = g
				}
				if (f.firstid != d) {
					e = a.formValidator.oneIsValid(d, 1, 3);
					if (f.errorcount == 0 && e.isvalid) {
						c.tag = 2;
						a.j.isTextBox(a("#" + d)) && a("#" + d).removeClass("action_color").removeClass("wrong_color")
					} else if (f.errorcount > 0) c.tag = 3;
					else {
						f.errorcount++;
						if (e) {
							a.formValidator.showMessage(e);
							c.tag = 3
						}
					}
				}
			}
		},
		removeArray: function(c, d) {
			for (var e = [], f = 0; f < c.length; f++) {
				var g = c[f];
				g.groupname != d && e.push(g)
			}
			return e
		},
		localTooltip: function(c) {
			c = c || window.event;
			var d = c.pageX || (c.clientX ? c.clientX + document.body.scrollLeft : 0);
			c = c.pageY || (c.clientY ? c.clientY + document.body.scrollTop : 0);
			a("#fvtt").css({
				top: c + 2 + "px",
				left: d - 40 + "px"
			})
		},
		removetip: function() {
			for (var c = document.getElementsByTagName("span"), d = 0; d < c.length; d++) {
				var e;
				if (e = c[d].id) if (e.indexOf("_Tip") != -1) if (e = a("#" + e)) {
					e.addClass("");
					e.html("")
				}
			}
		},
		IsSimple: function(c) {
			return /[\u4e00-\u9fa5]/.test(c)
		},
		IsNum: function(c) {
			return /^\d+$/.test(c)
		},
		QtoB: function(c) {
			for (var d = "", e = 0; e < c.length; e++) d += c.charCodeAt(e) == 12288 ? String.fromCharCode(c.charCodeAt(e) - 12256) : c.charCodeAt(e) > 65280 && c.charCodeAt(e) < 65375 ? String.fromCharCode(c.charCodeAt(e) - 65248) : String.fromCharCode(c.charCodeAt(e));
			return d
		},
		isDate: function(c) {
			c = c.match(/^(\d{1,4})(-|\/)(\d{1,2})\2(\d{1,2})$/);
			if (c == null) return false;
			var d = new Date(c[1], c[3] - 1, c[4]);
			return d.getFullYear() == c[1] && d.getMonth() + 1 == c[3] && d.getDate() == c[4]
		},
		checkTitle: function(c) {
			var d = /[\u4e00-\u9fa5]/.test(c);
			if (!d) return "\u6807\u9898\u592a\u8fc7\u7b80\u5355";
			if (d = isHasContact(c)) return "\u4e0d\u5141\u8bb8\u5305\u542b\u8054\u7cfb\u65b9\u5f0f";
			return true
		},
		checkContent: function(c) {
			if (!/[\u4e00-\u9fa5]/.test(c)) return "\u8865\u5145\u8bf4\u660e\u592a\u8fc7\u7b80\u5355";
			return true
		},
		checkSpecialSymbol: function(c) {
			c = /^(([\u4e00-\u9fa5]|[0-9]|[a-zA-Z]|[.\u3002()\uff08\uff09+#\/]))+$/.test(c);
			if (!c) return "\u4e0d\u5141\u8bb8\u586b\u5199\u7279\u6b8a\u7b26\u53f7\u3002\u53ea\u80fd\u586b\u5199\uff1a\u6c49\u5b57\u3001\u5b57\u6bcd\u548c.\uff08\uff09+ #";
			return c
		},
		checkZhaopinTitle: function(c) {
			var d = a.formValidator.IsSimple(c);
			if (!d) return "\u592a\u8fc7\u7b80\u5355";
			d = a.formValidator.checkSpecialSymbol(c);
			if (typeof d == "string") return d;
			return true
		}
	};
	a.fn.formValidator = function(c) {
		var d = {
			validatorgroup: "1",
			empty: false,
			submitonce: false,
			automodify: false,
			onshow: "\u8bf7\u8f93\u5165\u5185\u5bb9",
			onfocus: "\u8bf7\u8f93\u5165\u5185\u5bb9",
			oncorrect: "\u8f93\u5165\u6b63\u786e",
			onempty: "\u8f93\u5165\u5185\u5bb9\u4e3a\u7a7a",
			defaultvalue: null,
			bind: true,
			validatetype: "InitValidator",
			tipcss: {
				left: "10px",
				top: "1px",
				height: "20px",
				width: "250px"
			},
			triggerevent: "blur",
			forcevalid: false,
			q2b: false,
			fun: function() {},
			eid: ""
		};
		c = c || {};
		if (c.validatorgroup == undefined) c.validatorgroup = "1";
		var e = a.formValidator.getInitConfig(c.validatorgroup);
		a.extend(true, d, c);
		return this.each(function() {
			var f = a(this),
				g = {};
			a.extend(true, g, d);
			if (this.id == "") this.id = c.eid;
			var h = g.tipid ? g.tipid : this.id + "_Tip";
			d.tipid = h;
			a.formValidator.appendValid(this.id, d);
			g = e.validobjectids;
			if (g.indexOf("#" + this.id + " ") == -1) e.validobjectids = g == "" ? "#" + this.id : g + ",#" + this.id;
			g = this.tagName.toLowerCase();
			var j = this.type,
				k = d.defaultvalue;
			if (g == "input" || g == "textarea") {
				f.focus(function() {
					if (!e.alertmessage) {
						var l = a("#" + h);
						this.lastshowclass = l.attr("class");
						this.lastshowmsg = l.html();
						a.formValidator.setTipState(this, "onFocus", d.onfocus);
						k && k != "" && k == f.val() && f.val("")
					}
					if (j == "password" || j == "text" || j == "textarea" || j == "file") this.validoldvalue = f.val()
				});
				f.bind(d.triggerevent, function() {
					k && k != "" && f.val() == "" && f.val(k);
					var l = a.formValidator.oneIsValid(this.id, 1, 2);
					if (l != null) if (l.ajax >= 0) a.formValidator.showAjaxMessage(l);
					else if (l.tag == 2) {
						a.formValidator.showMessage(l);
						l.isvalid && d.fun && d.fun()
					}
				})
			} else if (g == "select") {
				f.bind("focus", function() {
					e.alertmessage || a.formValidator.setTipState(this, "onFocus", d.onfocus)
				});
				f.bind("blur", function() {
					var l = a.formValidator.oneIsValid(this.id, 1, 2);
					if (l != null) if (l.ajax >= 0) a.formValidator.showAjaxMessage(l);
					else l.tag == 2 && a.formValidator.showMessage(l)
				})
			}
		})
	};
	a.fn.inputValidator = function(c) {
		var d = {
			isvalid: false,
			min: 0,
			max: 99999999999999,
			type: "size",
			onerror: "\u8f93\u5165\u9519\u8bef",
			validatetype: "InputValidator",
			empty: false,
			wideword: true
		};
		c = c || {};
		a.extend(true, d, c);
		return this.each(function() {
			a.formValidator.appendValid(this.id, d)
		})
	};
	a.fn.compareValidator = function(c) {
		var d = {
			isvalid: false,
			desid: "",
			operateor: "=",
			onerror: "\u8f93\u5165\u9519\u8bef",
			validatetype: "CompareValidator"
		};
		c = c || {};
		a.extend(true, d, c);
		return this.each(function() {
			a.formValidator.appendValid(this.id, d)
		})
	};
	a.fn.regexValidator = function(c) {
		var d = {
			isvalid: false,
			regexp: "",
			param: "i",
			datatype: "string",
			onerror: "\u8f93\u5165\u7684\u683c\u5f0f\u4e0d\u6b63\u786e",
			validatetype: "RegexValidator"
		};
		c = c || {};
		a.extend(true, d, c);
		return this.each(function() {
			a.formValidator.appendValid(this.id, d)
		})
	};
	a.fn.functionValidator = function(c) {
		var d = {
			isvalid: true,
			fun: function() {
				this.isvalid = true
			},
			validatetype: "FunctionValidator",
			onerror: "\u8f93\u5165\u9519\u8bef"
		};
		c = c || {};
		a.extend(true, d, c);
		return this.each(function() {
			a.formValidator.appendValid(this.id, d)
		})
	};
	a.fn.groupValidator = function(c) {
		var d = {
			isvalid: true,
			groupName: "",
			nextgroupid: "",
			validatetype: "GroupValidator",
			onerror: "\u8f93\u5165\u9519\u8bef"
		};
		c = c || {};
		a.extend(true, d, c);
		return this.each(function() {
			a.formValidator.appendValid(this.id, d)
		})
	};
	a.fn.ajaxValidator = function(c) {
		var d = {
			isvalid: false,
			lastValid: "",
			type: "GET",
			url: "",
			addidvalue: true,
			datatype: "html",
			data: "",
			async: true,
			cache: false,
			beforesend: function() {
				return true
			},
			success: function() {
				return true
			},
			complete: function() {},
			processdata: false,
			error: function() {},
			buttons: null,
			onerror: "\u670d\u52a1\u5668\u6821\u9a8c\u6ca1\u6709\u901a\u8fc7",
			onwait: "\u6b63\u5728\u7b49\u5f85\u670d\u52a1\u5668\u8fd4\u56de\u6570\u636e",
			validatetype: "AjaxValidator"
		};
		c = c || {};
		a.extend(true, d, c);
		return this.each(function() {
			a.formValidator.appendValid(this.id, d)
		})
	};
	a.fn.defaultPassed = function(c) {
		return this.each(function() {
			for (var d = this.settings, e = 1; e < d.length; e++) {
				d[e].isvalid = true;
				a.formValidator.getInitConfig(d[0].validatorgroup).alertmessage || a.formValidator.setTipState(this, c ? "onShow" : "onCorrect", d[0].oncorrect)
			}
		})
	};
	a.fn.unFormValidator = function(c) {
		return this.each(function() {
			this.settings[0].bind = !c;
			c ? a("#" + this.settings[0].tipid).hide() : a("#" + this.settings[0].tipid).show()
		})
	};
	a.fn.showTooltips = function() {
		if (a("body [id=fvtt]").length == 0) {
			fvtt = a("<div id='fvtt' style='position:absolute;z-index:56002'></div>");
			a("body").append(fvtt);
			fvtt.before("<iframe src='about:blank' class='fv_iframe' scrolling='no' frameborder='0'></iframe>")
		}
		return this.each(function() {
			jqobj = a(this);
			s = a("<span class='top' id=fv_content style='display:block'></span>");
			b = a("<b class='bottom' style='display:block' />");
			this.tooltip = a("<span class='fv_tooltip' style='display:block'></span>").append(s).append(b).css({
				filter: "alpha(opacity:95)",
				KHTMLOpacity: "0.95",
				MozOpacity: "0.95",
				opacity: "0.95"
			});
			jqobj.mouseover(function(c) {
				a("#fvtt").append(this.tooltip);
				a("#fv_content").html(this.Tooltip);
				a.formValidator.localTooltip(c)
			});
			jqobj.mouseout(function() {
				a("#fvtt").empty()
			});
			jqobj.mousemove(function(c) {
				a("#fv_content").html(this.Tooltip);
				a.formValidator.localTooltip(c)
			})
		})
	}
})(jQuery);

function getElementWidth(a) {
	x = document.getElementById(a);
	return x.offsetWidth
}
function getTopLeft(a) {
	obj = {};
	o = document.getElementById(a);
	oLeft = o.offsetLeft;
	for (oTop = o.offsetTop; o.offsetParent != null;) {
		oParent = o.offsetParent;
		oLeft += oParent.offsetLeft;
		oTop += oParent.offsetTop;
		o = oParent
	}
	obj.top = oTop;
	obj.left = oLeft;
	return obj
}

function isHasContact(a) {
	var c = /([0-9\uff10\uff11\uff12\uff13\uff14\uff15\uff16\uff17\uff18\uff19\u96f6\u4e00\u4e8c\u4e09\u56db\u4e94\u516d\u4e03\u516b\u4e5d\u58f9\u8d30\u53c1\u8086\u4f0d\u9646\u67d2\u634c\u7396]{7})/;
	c = new RegExp(c);
	c = c.test(a);
	if (!c) {
		c = /(([q\uff51Q\uff31]+)(.?|.{1,5})(([0-9]|[\uff10-\uff19]|[\u96f6\u4e00\u4e8c\u4e09\u56db\u4e94\u516d\u4e03\u516b\u4e5d]|[\u2460-\u2468]|[\u3220-\u3228])[-_@\~\#\$\%\^\&\*]*){5,13})|((([0-9]|[\uff10-\uff19]|[\u96f6\u4e00\u4e8c\u4e09\u56db\u4e94\u516d\u4e03\u516b\u4e5d]|[\u2460-\u2468]|[\u3220-\u3228])[-_@\~\#\$\%\^\&\*]*){5,13}(.?|.{1,5})([q\uff51Q\uff31]+))/;
		c = new RegExp(c);
		c = c.test(a)
	}
	return c
}(function(a) {
	a.debug = false;
	a.log = function() {};
	a.GA = {
		s1: function(c, d) {
			try {
				typeof _gaq != "undefined" && _gaq.push(["pageTracker._trackEvent", "58-post", myInfo.rootCateName + "-" + myInfo.currentCateName + c, d])
			} catch (e) {}
		}
	};
	a.j = {
		Cookie: {
			get: function(c) {
				c = document.cookie.match(new RegExp(c + "=([^&;]+)"));
				if (c != null) return decodeURI(c[1]);
				return ""
			},
			setcookie: function(c, d) {
				a.j.Cookie.set(c, d)
			},
			set: function(c, d, e, f, g) {
				c = c + "=" + escape(d) + ";";
				if (e && e != "") c = c + "domain=" + e + ";";
				if (f && f > 0) {
					e = new Date;
					e.setTime(e.getTime() + 864E5 * f);
					c = c + "expires=" + e.toGMTString() + ";"
				}
				if (g && g != "") c = c + "path=" + g + ";";
				document.cookie = c
			},
			del: function(c) {
				a.j.Cookie.set(c, " ", "", -1, "/")
			}
		},
		AjaxProvider: function(c, d) {
			a.post(c, {}, function(e) {
				d(e)
			}, "html")
		},
		callajax: function(c, d, e) {
			var f = "/ajax?";
			c = "&action=" + c + "&";
			c += d;
			c += "&rand=" + new Date;
			f += c;
			a.j.AjaxProvider(f, e)
		},
		getdicvalue: function(c, d, e) {
			try {
				for (var f = 0; f < d.length; f++) {
					var g = d[f].split(e);
					if (c.toLowerCase() == g[0].toLowerCase()) {
						var h = g[1];
						if (h) return h
					}
				}
				return ""
			} catch (j) {
				return ""
			}
		},
		getTopLeft: function(c) {
			obj = {};
			c = document.getElementById(objectId);
			oLeft = c.offsetLeft;
			for (oTop = c.offsetTop; c.offsetParent != null;) {
				oParent = c.offsetParent;
				oLeft += oParent.offsetLeft;
				oTop += oParent.offsetTop;
				c = oParent
			}
			obj.top = oTop;
			obj.left = oLeft;
			return obj
		},
		scrollToElement: function(c) {
			try {
				var d = a.j.getTopLeft(c);
				parent ? parent.window.scrollTo(d.left, d.top) : window.scrollTo(d.left, d.top)
			} catch (e) {
				window.scrollTo(0, 0)
			}
		},
		geturlparam: function(c, d) {
			var e = new RegExp("(^|&)" + d + "=([^&]*)(&|$)");
			e = c.substr(c.indexOf("?") + 1).match(e);
			if (e != null) return unescape(e[2]);
			return null
		},
		initEffectiveDate: function() {
			var c = a("#hidEffectiveDate"),
				d = a("#EffectiveDate");
			if (d && c && c.val() != "") if (c.val() == "7" || c.val() == "30" || c.val() == "100" || c.val() == "365") d.val(c.val())
		},
		appendvalue: function() {
			var c, d, e, f, g, h, j = a("#StartTime"),
				k = a("#StartStation"),
				l = a("#EndStation"),
				m = a("#Num"),
				n = a("#count"),
				p = a("#ObjectType");
			if (j) c = j.val();
			if (k) {
				d = k.val();
				if (k.attr("Except") == d) d = ""
			}
			if (l) {
				e = l.val();
				if (l.attr("Except") == e) e = ""
			}
			if (m) f = m.val();
			if (n) g = n.val();
			if (p) h = a("#ObjectType").attr("disabled") == true ? "\u7c7b\u578b\u4e0d\u9650" : a("#ObjectType option:selected").text();
			a.j.appendtitle(c, d, e, f, g, h)
		},
		appendtitle: function(c, d, e, f, g, h) {
			var j = "";
			if (d != "" && d != null) j = d + "-";
			if (e != "" && e != null) j += e + " ";
			if (f != "" && f != null) j += f + " ";
			if (h != "" && h != null) j += h;
			if (g != "" && g != null) j += g + "\u5f20";
			if (c != "" && c != null) j += " \u53d1\u8f66\u65e5\u671f:" + c;
			a("#Title").val(j)
		},
		dyniframesize: function(c) {
			c = document.getElementById(c);
			c.height = "10px";
			if (document.getElementById) if (c && !window.opera) if (c.contentDocument && c.contentDocument.body.offsetHeight) c.height = c.contentDocument.body.offsetHeight;
			else if (c.Document && c.Document.body.scrollHeight) c.height = c.Document.body.scrollHeight
		},
		getCityDataFromXml: function(c, d) {
			a.ajax({
				url: "/config/City.xml",
				type: "get",
				dataType: "xml",
				timeout: 5E3,
				cache: false,
				error: function() {},
				success: function(e) {
					var f = [];
					a(e).find("province").each(function() {
						var g = [];
						g.push(a(this).attr("value"));
						a(this).find("city").each(function() {
							g.push(a(this).attr("value"))
						});
						f.push(g)
					});
					a(c).data("CityData", f);
					d()
				}
			})
		},
		initTagCheck: function(c) {
			var d = 2;
			if (c) if (!isNaN(c)) if (parseInt(c) > 0) d = parseInt(c);
			a(':checkbox[name="Tag"]').formValidator({
				tipid: "infotag_Tip",
				onfocus: ""
			}).functionValidator({
				fun: function() {
					return a(':checkbox[name="Tag"]:checked').length <= d
				},
				onerror: "\u6700\u591a\u53ea\u80fd\u9009\u62e9" + d + "\u4e2a\u6807\u7b7e"
			});
			a(':checkbox[name="Tag"]').bind("click", function() {
				a(':checkbox[name="Tag"]:checked').length <= d ? a.formValidator.setTipState(null, "onCorrect", " ", "infotag_Tip") : a.formValidator.setTipState(null, "onError", "\u6700\u591a\u53ea\u80fd\u9009\u62e9" + d + "\u4e2a\u6807\u7b7e", "infotag_Tip")
			})
		},
		CalClickAfter: function(c) {
			if (a(c).data("hasEvent") != 1) {
				a(c).data("hasEvent", 1);
				a("#GGS_cal_days").bind("click", function() {
					c.focus()
				})
			}
		},
		isTextBox: function(c) {
			if (c == null) return false;
			var d = a(c).get(0).id;
			if (!a(c).get(0).tagName) return false;
			c = a(c).get(0).tagName.toUpperCase();
			if (a("#" + d + ":text").length == 1) return true;
			if (c == "TEXTAREA") return true;
			return false
		},
		getTextBoxJoinValue: function(c) {
			var d = "";
			try {
				var e = [],
					f = a(":text:visible");
				f.each(function(h) {
					if (f.get(h).id != "Title" && f.get(h).id != "Phone" && f.get(h).id != "codeText" && f.get(h).id != "IM") {
						h = a.trim(f.get(h).value);
						if (h.length > 1) {
							var j = false;
							if (isNaN(h)) j = true;
							else if (h.length >= 11) j = true;
							if (j) e[e.length] = h
						}
					}
				});
				d = e.join(c)
			} catch (g) {}
			return d
		},
		createFieldForTextJoinValue: function(c) {
			a("#hiddenTextBoxJoinValue").length == 0 && a(c).append('<input type="hidden" id="hiddenTextBoxJoinValue" name="hiddenTextBoxJoinValue" value="" />');
			c = a.j.getTextBoxJoinValue(":");
			a("#hiddenTextBoxJoinValue").val(c)
		},
		initContentTip: function(c) {
			a.j.initTip("Content", c)
		},
		initTip: function(c, d) {
			var e = a("#" + c);
			if (e.length != 0) {
				e.val() == "" && e.val(d).addClass("gray");
				e.bind("focus", function() {
					e.removeClass("gray");
					e.val() == d && e.val("")
				}).bind("blur", function() {
					if (e.val() == "") {
						e.val(d);
						e.addClass("gray")
					} else e.removeClass("gray")
				})
			}
		},
		getFullTextSearchVal: function(c) {
			var d = a("#" + c);
			if (d.length == 0) return "";
			if (d.attr("nameid") == undefined) if (d.attr("type") && d.attr("type").toLowerCase() != "hidden") if (a("#" + c + ":hidden").length > 0) return "";
			c = d.get(0);
			if (a.j.isTextBox(c)) return a(c).val();
			d = a(c).get(0).tagName.toUpperCase();
			if (d == "SELECT") {
				if (c.options[c.selectedIndex].value) {
					d = a(c.options[c.selectedIndex]).attr("ci");
					if (d != undefined) if (d != "0") return "";
					d = a(c.options[c.selectedIndex]).attr("alias");
					if (d != undefined) d += "|";
					else d = "";
					return d + c.options[c.selectedIndex].text
				}
				return ""
			}
			if (d == "INPUT") {
				d = a(c).attr("type").toUpperCase();
				if (d == "CHECKBOX") if (c.checked) {
					var e = a(c).next("label");
					if (e.length > 0) return a(e).html();
					e = a(c).next("span");
					if (e.length > 0) return a(e).html()
				}
				if (d == "RADIO") if (c.checked) {
					e = a(c).next("span");
					if (e.length > 0) return a(e).html()
				}
				if (d == "HIDDEN") return c.value
			}
			return ""
		},

	};
	a.c = {
		common: {
			isMobilePost: function() {
				var c = false;
				if ("ext" in ____json4fe) c = ____json4fe.ext.sys == "mobilepost";
				return c
			},
			dodot_sumbit: function(c) {
				if (c.keyCode == 13) {
					c.keyCode = 0;
					return false
				}
			},
			addOptionsToSelect: function(c, d, e) {
				var f = document.createElement("option");
				f.value = d;
				f.text = e;
				a("#" + c).get(0).options.add(f)
			},
			setSelectedOption: function(c, d, e) {
				a("#" + c + " option").each(function(f, g) {
					var h = false;
					if (d != null && g.value == d) h = true;
					else if (e != null) if (g.text == e) h = true;
					if (h) {
						a(g).attr("selected", "selected");
						return false
					}
				})
			},
			isIE6: function() {
				if (a.browser.msie) return a.browser.version == 6;
				return false
			},
			isIeVersion: function(c) {
				if (a.browser.msie) return a.browser.version == c;
				return false
			},
			stripHtml: function(c) {
				c = c || "";
				c = c.replace(new RegExp("<script[^>.]*>[sS]*?<\/script>", "gim"), " ");
				c = c.replace(new RegExp("<style[^>.]*>[sS]*?</style>", "gim"), " ");
				c = c.replace(new RegExp("<(.| )+?>", "gim"), " ");
				c = c.replace(/</, "<");
				return c = c.replace(/>/, ">")
			},
			set_focus_height: function() {
				var c = a(this).attr("focus_height");
				if (c) {
					a(this).data("height") || a(this).data("height", a(this).height());
					a(this).height(parseInt(c))
				}
			},
			set_blur_height: function() {
				var c = a(this).data("height");
				c && c != a(this).height() && a(this).height(c)
			},
			getRadioIndex: function(c) {
				var d = -1;
				a(':radio[name="' + c + '"]').each(function(e, f) {
					if (f.checked) {
						d = e;
						return false
					}
				});
				return d
			},
			getSelectedText: function(c) {
				var d = null;
				c = a("#" + c);
				if (c.length > 0) d = c.get(0).options[c.get(0).selectedIndex].text;
				return d
			},
			inArray: function(c, d) {
				var e = false;
				a(c).each(function(f, g) {
					if (g == d) {
						e = true;
						return false
					}
				});
				return e
			},
			redraw: function(c, d) {
				c >= d.length || a(d[c]).each(function(e, f) {
					a(f.s).each(function(g, h) {
						a(":text#" + h).removeAttr("disabled");
						a("#" + h).show()
					});
					a(f.h).each(function(g, h) {
						a(":text#" + h).attr("disabled", "disabled");
						a("#" + h).hide()
					})
				})
			},
			getExt: function(c) {
				var d = null;
				if (____json4fe.ext) d = ____json4fe.ext[c];
				return d
			}
		},

		Error: {
			errorMessage: {
				POSTTOOMORE: '<div class="sorry" id="tishi"><p>{MESSAGE}</p></div>',
			},


			setError: function(c) {
				var d = a("#toperro");
				d.addClass("sc");
				d.css("display", "");
				d.html(c);
				a.j.scrollToElement(d.get(0));
				flagSubmit = false;
				a.formValidator.subfalse("aspnetForm", "fabu")
			},
			showError: function(c) {
				alert(c);
				flagSubmit = false;
				a.formValidator.subfalse("aspnetForm", "fabu")
			},
			showVipError: function(c) {
				var d = a("#toperro");
				d.addClass("sc");
				d.show().html(c);
				a("#fabu").attr("disabled", "disabled")
			}
		},
		Layer: {
			setting: {
				MsgTitle: "",
				height: 500,
				width: 500,
				html: "",
				sBox: '<div id=\'ab2\' class=\'boxout\'><div id="divTm" class="tm"></div><div id="divBoxin" class="boxin">{0}<div id="dialogBoxContent"></div></div></div></div>'
			},
			event: function() {
				this.init();
				a("#body_pr").length > 0 && a("#body_pr").css("display", "block");
				a("#dialogBoxContent").html(this.setting.html);
				a("#divTm")[0].style.height = this.setting.height;
				a("#ab_hhh").css("display", "block")
			},
			init: function() {
				this.LayerDiv();
				var c;
				if (a("#ab_hhh").length <= 0) {
					c = document.createElement("div");
					c.id = "ab_hhh";
					document.body.appendChild(c)
				} else c = a("#ab_hhh")[0];
				c.innerHTML = this.setting.sBox.replace("{0}", this.setting.MsgTitle);
				this.middle("ab_hhh")
			},
			LayerDiv: function() {
				var c;
				if (a("#body_pr").length <= 0) {
					c = document.createElement("div");
					c.id = "body_pr";
					c.style.position = "absolute";
					c.style.left = "0pt";
					c.style.top = "0pt";
					c.style.zIndex = 9999;
					c.style.width = "100%";
					c.style.backgroundColor = "rgb(0, 0, 0)";
					c.style.height = document.body.scrollHeight + 100 + "px";
					c.style.opacity = "0.3";
					if (document.all) {
						c.style.filter = "alpha(opacity=30)";
						c.innerHTML = '<iframe src="about:blank" frameborder="0" style="position:absolute; visibility:inherit; top:0px; left:0px; width:100%; height:100%; z-index:9999; filter=\'progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)\';"></iframe>'
					}
					document.body.appendChild(c)
				}
			},
			middle: function(c) {
				c = document.getElementById(c);
				c.style.display = "";
				c.style.position = "absolute";
				c.style.width = "450px";
				c.style.zIndex = 99999;
				c.style.left = document.body.clientWidth / 2 - c.offsetWidth / 2 + "px";
				c.style.top = this.DialogLoc(c.offsetHeight) + "px"
			},
			DialogLoc: function(c) {
				var d = document.documentElement;
				if (window.innerWidth) {
					var e = window.innerHeight;
					d = window.pageYOffset
				} else {
					e = d.offsetHeight;
					d = d.scrollTop
				}
				return t_DiglogY = d + (e - c) / 2
			}
		},

	}
})(jQuery);


(function(a) {
	a.bll = {};
	a.bll.keywords = {
		getdata: function() {
			if (!a.c.common.isMobilePost()) if ("_hEditor" in window != false) if (_hEditor.he != null) {
				var c = "http://suggest.58.com:8089/getdistributewords_post.do";
				c = "/ajax?action=getcontentsearchkey";
				var d = a.c.common.stripHtml(_hEditor.he.getValue());
				a.post(c, {
					cityid: ____json4fe.locallist.dispid,
					cateid: ____json4fe.catentry[1].dispid,
					maxnum: 6,
					callback: "$.bll.keywords.getdata_callback",
					title: a.bll.keywords.getTitleAndTag(),
					content: d
				}, function() {}, "script")
			}
		},
		getdata_callback: function(c) {
			c && a("body").data("context_keyword", c)
		},
		joinContentKeyword: function(c) {
			try {
				var d = [],
					e = a("body").data("context_keyword");
				e != null && e.length > 0 && a(e).each(function(g, h) {
					c.indexOf(h) == -1 && d.push(h)
				});
				if (d.length > 0) c += "|" + d.join("|")
			} catch (f) {}
			return c
		},
		getParaJoinValue: function() {
			var c = "";
			try {
				var d = [];
				a("form#aspnetForm select").each(function() {
					if (a(this).attr("id") != "selectDiduanHidden") {
						var f = a(this).val();
						f != null && f.length > 0 && d.push(this.options[this.selectedIndex].text)
					}
				});
				c = d.join("|")
			} catch (e) {}
			return c
		},
		getTitleAndTag: function() {
			var c = "";
			try {
				var d = a("#Title").val();
				if (d == null) d = "";
				var e = a.bll.keywords.getParaJoinValue();
				c = "t=" + d + "&tag=" + e
			} catch (f) {}
			return c
		},
		init: function() {}
	}
})(jQuery);

$(document).ready(function() {
	$.bll.keywords.init()
});