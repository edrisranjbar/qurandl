let selectedCommentId;
let replyForm = document.querySelector("form");
const deleteModal = document.getElementById('delete-comment-reply-modal')
const deleteModalClosebtn = deleteModal.querySelector(".btn-close")
const clickEvent = new Event('click')

deleteModal.addEventListener('show.bs.modal', (e) => {
    const rowDeleteBtn = e.relatedTarget
    const commentId = e.relatedTarget.dataset.commentId
    document.getElementById("modal-delete-comment-reply-btn").addEventListener('click', () => {

        deleteReply(commentId).then(
            response => {
                if (response.ok) {
                    window.location.reload();
                } else {
                    console.error("reply couldn't be deleted");
                }
            }
        )

        deleteModalClosebtn.dispatchEvent(clickEvent);
    })
})

async function deleteReply(commentId) {
    return await fetch(`${apiBaseUrl}/admin/comments/${commentId}/deleteReply`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
        },
    })
}

function openReplyModal(element, id) {
    const replyModal = new bootstrap.Modal('#reply-modal', {})
    replyModal.show();
    selectedCommentId = id;
}

function saveReply() {
    replyForm.action = `${webBaseUrl}/admin/comments/${selectedCommentId}/reply`;
    replyForm.submit();
}
