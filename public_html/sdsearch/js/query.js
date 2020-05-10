import { MediawikiApi } from 'wikidata-ux';

class CommonsApi extends MediawikiApi {
    constructor(opts = {}) {
        super('https://commons.wikimedia.org/w/api.php');
        this.thumbSize = opts.thumbSize || 300;
    }

    addThumb(title, size = null) {
        size = !!size ? size : this.thumbSize;
        return `https://commons.wikimedia.org/wiki/Special:FilePath/${title}?width=${size}`;
    }

    async search(query, opts = {}) {
        opts = Object.assign({
            limit : 20,
            namespace : '*',
            thumbSize : this.thumbSize
        }, opts);

        const results = await this.call({
            'action' : 'query',
            'list' : 'search',
            'srsearch' : query,
            'srnamespace' : opts.namespace,
            'srlimit' : opts.limit
        });

        return results.query.search.map((item) => {
            const title = item.title.replace("File:", "");
            item.thumb = this.addThumb(title, opts.thumbSize);
            item.url = `https://commons.wikimedia.org/wiki/${item.title}`;
            return item;
        });
    }
}

// https://commons.wikimedia.org/w/api.php?action=query&list=search&srsearch=haswbstatement:P180=Q146&srnamespace=*&srlimit=500&format=json

export default class Query {
    constructor(query) {
        this.query = query;
        this.api = new CommonsApi();
    }

    parseQuery(query) {
        let q = '';

        for (const claim of query) {
            for (const item of claim.items) {
                q += `haswbstatement:${claim.prop.id}=${item.id}`;
            }
        }

        return q;
    }

    async search() {
        const query = this.parseQuery(this.query);
        const results = await this.api.search(query, { 'namespace' : 6 });
        return results;
    }
}