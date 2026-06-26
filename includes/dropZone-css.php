<style type="text/css">
	  /* start - dropzone style*/
    .drop-zone 
    {
        width: 100%;
        /*max-width: 500px;*/
        height: 150px;
        margin: auto;
        padding: 20px;
        border: 2px dashed #ffc600;
        border-radius: 10px;
        text-align: center;
        cursor: pointer;
        margin-bottom: 5px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .drop-zone.hover 
    {
        border-color: #666;
    }

    .preview 
    {
        margin-top: 20px;
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
        flex-direction: column;
        align-content: center;
        width: 80%;
        margin: auto;

    }

    .preview-item 
    {
        position: relative;
        display: inline-block;
        text-align: center;
        border: 1px solid #ccc;
        padding: 5px;
        border-radius: 5px;
        background-color: #f9f8f8;
    }

    .preview-item .file-name 
    {
        font-size: 14px;
        color: #333;
        margin-top: 5px;
    }

    .preview-item .remove-btn 
    {
        position: absolute;
        top: 0;
        right: 0;
        background: red;
        color: white;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .preview-item:hover::after 
    {
        /*content: attr(data-filename);*/
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 2px 8px;
        border-radius: 5px;
        font-size: 12px;
        white-space: nowrap;
    }

    /* end - dropzone style*/
</style>